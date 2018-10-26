<?php

namespace estbase\Core\Domain\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Classe que exten de "Model" i que ens servirà per a validar que un camp d'un formulari
 * si no porta dades, que el seteji com a null i no doni error a la validació.
 *
 * @package App\Models
 */
abstract class MyBaseModel extends Model
{
    /**
     * Funció que ens retornará un null si el camp que valida es buit.
     *
     * @param $field
     * @return null
     */
    public function nullIfBlank($field)
    {
        return trim($field) !== '' ? $field : null;
    }
}