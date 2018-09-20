<?php

namespace estbase\SharedKernel\Application\UseCase;

use estbase\SharedKernel\Application\Exception\{InvalidArgumentException, GenericApplicationException, EntityNotFoundException as ApplicationEntityNotFoundException};
use estbase\SharedKernel\Application\Service\Logger\LoggerInterface;
use estbase\SharedKernel\Domain\Exception\{DomainException, EntityNotFoundException as DomainEntityNotFoundException};

abstract class UseCase
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface|null
     * @throws DomainEntityNotFoundException
     * @throws DomainException
     * @throws GenericApplicationException
     * @throws \Exception
     */
    public function execute(RequestInterface $request) : ResponseInterface
    {
        try {
            $this->assertRequestIsValidInstance($request);
            return $this->doExecute($request);
        } catch (DomainEntityNotFoundException $e) {
            throw $this->transformToApplicationEntityNotFoundException($e);
        } catch (DomainException $e) {
            throw $this->transformToGenericApplicationException($e);
        } catch (GenericApplicationException $e) {
            $this->logWarning(
                sprintf("Application Exception: %s. Message: %s", get_class($e), $e->getMessage()),
                $e->getTrace()
            );
            throw $e;
        } catch (\Exception $e) {
            $this->logError(
                sprintf("Unexpected Exception: %s. Message: %s", get_class($e), $e->getMessage()),
                $e->getTrace()
            );
            throw $e;
        }
    }

    /**
     * @param RequestInterface $request
     * @throws InvalidArgumentException
     */
    private function assertRequestIsValidInstance(RequestInterface $request)
    {
        if (!$this->requestContainsTheSameUseCaseName($request) && !NullRequest::equalsTo($request)) {
            throw new InvalidArgumentException(
                sprintf(
                    "The class %s is not a valid Request for the use case %s",
                    get_class($request),
                    get_class($this)
                )
            );
        }
    }

    /**
     * @param RequestInterface $request
     * @return bool
     */
    private function requestContainsTheSameUseCaseName(RequestInterface $request) : bool
    {
        $useCaseParsedName = str_replace('UseCase', '', get_class($this));
        return strpos(get_class($request), $useCaseParsedName) !== false;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface|void
     */
    abstract protected function doExecute(RequestInterface $request);

    /**
     * @param DomainEntityNotFoundException $exception
     * @return ApplicationEntityNotFoundException
     */
    private function transformToApplicationEntityNotFoundException(DomainEntityNotFoundException $exception) : ApplicationEntityNotFoundException
    {
        $this->logCritical($exception->getMessage(), $exception->getTrace());
        return new ApplicationEntityNotFoundException(sprintf("Entity not found exception: %s", $exception->getMessage()), $exception);
    }

    /**
     * @param DomainException|\Exception $exception
     * @return GenericApplicationException
     */
    private function transformToGenericApplicationException($exception) : GenericApplicationException
    {
        $this->logError($exception->getMessage(), $exception->getTrace());
        return new GenericApplicationException('Generic application exception: ' . $exception->getMessage(), $exception);
    }

    /**
     * @param string $message
     * @param array $context
     */
    protected function logWarning(string $message, array $context = [])
    {
        if (!$this->loggerIsEnabled()) {
            return;
        }
        $this->logger->warning($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    protected function logCritical(string $message, array $context = [])
    {
        if (!$this->loggerIsEnabled()) {
            return;
        }
        $this->logger->critical($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    protected function logError(string $message, array $context = [])
    {
        if (!$this->loggerIsEnabled()) {
            return;
        }
        $this->logger->error($message, $context);
    }

    /**
     * @return bool
     */
    private function loggerIsEnabled() : bool
    {
        return $this->logger instanceof LoggerInterface;
    }
}
