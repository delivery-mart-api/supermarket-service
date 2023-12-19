<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $register = [
        'username' => [
            'rules' => 'required|min_length[5]|is_unique[users.username]',
        ],
        'password' => [
            'rules' => 'required',
        ],
        'cabang' => [
            'rules' => 'required|is_unique[users.cabang]',
        ],
    ];
    
    public $add_product = [
        'nama' => [
            'rules' => 'required|is_unique[products.nama]',
        ],
        'harga' => [
            'rules' => 'required|is_natural',
        ],
        'stok' => [
            'rules' => 'required|is_natural',
        ],
        'berat' => [
            'rules' => 'required|is_natural',
        ]
    ];

    public $update_product = [
        'id' => [
            'rules' => 'is_natural',
        ],
        'nama' => [
            'rules' => 'required|is_unique[products.nama,id,{id}]',
        ],
        'harga' => [
            'rules' => 'required|is_natural',
        ],
        'stok' => [
            'rules' => 'required|is_natural',
        ],
        'berat' => [
            'rules' => 'required|is_natural',
        ]
    ];
}
