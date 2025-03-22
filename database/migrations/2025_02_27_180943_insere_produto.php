<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        $catEsporte = new \App\Models\Categoria(['categoria' => 'Esporte']);
        $catEsporte->save();

        $catBrinquedos = new \App\Models\Categoria(['categoria' => 'Brinquedos']);
        $catBrinquedos->save();
        

        $prod1 = new \App\Models\Produto([
            'nome' => 'Produto 1',
            'valor' => 10,
            'descricao' => 'Bola de futebol',
            'foto' => 'images/produto1.JPG',
            'categoria_id' => $catEsporte->id
        ]);
        $prod1->save();

        $prod2 = new \App\Models\Produto([
            'nome' => 'Produto 2',
            'valor' => 12,
            'descricao' => 'Bola de futebol da nike',
            'foto' => 'images/produto2.JPG',
            'categoria_id' => $catEsporte->id
        ]);
        $prod2->save();
        
        $prod3 = new \App\Models\Produto([
            'nome' => 'Produto 3',
            'valor' => 23,
            'descricao' => 'Chuteira dahora',
            'foto' => 'images/produto3.JPG',
            'categoria_id' => $catEsporte->id
        ]);
        $prod3->save();
        
        $prod4 = new \App\Models\Produto([
            'nome' => 'Produto 4',
            'valor' => 8,
            'descricao' => 'Boneca do demônio',
            'foto' => 'images/produto4.JPG',
            'categoria_id' => $catBrinquedos->id
        ]);
        $prod4->save();
        
        $prod5 = new \App\Models\Produto([
            'nome' => 'Produto 5',
            'valor' => 1000,
            'descricao' => 'LadyBâgui',
            'foto' => 'images/produto5.JPG',
            'categoria_id' => $catBrinquedos->id
        ]);
        $prod5->save();
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
