<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\TPVV\Pasarela;
use App\TPVV\Objects\Item;
use App\TPVV\Objects\Request;
use App\TPVV\Objects\Response;
use App\TPVV\Objects\Struct;


class PasarelaTest extends TestCase
{
    /**
     * Se prueba el constructor de Item
     *
     * @expectedException ArgumentCountError
     */

    public function testConstructorItem()
    {
        $item = new Item();
    }

     /**
     * Se prueba el constructor de Pasarela
     *
     * @expectedException ArgumentCountError
     */
    public function testConstructorPasarela()
    {
        $tpvv = new Pasarela();
    }

    /**
     * Se prueba la clase Pasarela
     *
     * @return void
     */
    public function testClasePasarelaGetRequest(){
        $tpvv = new Pasarela('web',1);
        $this->assertEquals(false,$tpvv->GetURL());
        $this->assertEquals(false,$tpvv->GetREQUEST());
        $tpvv->AnadirProducto(1,1,1);
        $this->assertNotEquals(false,$tpvv->GetURL());
        $this->assertNotEquals(false,$tpvv->GetREQUEST());
    }

    public function testClasePasarelaSetRequest(){
        //| web = Laravel | idPedido=1 | Carrito = {1,1,1},{2,2,2},{3,3,3} - precio=1 | token 
        $request = "zZrBOv9/4t0SThCd2sYtdbnPGHLpNtnpjh+cfTx6qsJ6YaVtR5uPVgBi5J46SupplBoIv7QukUnkpOWlqgONO/FIrHRsTcx95u77kcssanP0GPAGP8UQPniAhtYD/oagdDoOflkVFUf7UWyymm971kpj+CEwybBwDY2lh/DZrUh83L5SLSJ4cZKWMgDFkwY59GKTazee6oXnLc61HDFO8ueiBW6NiZjeNnqRN4iALCNF6ahZzof9HgyVAnYYwxbPrcY3o/KD8t/mnGKglyqLIBqiim0XElY8Qxs5H3wjZ7q6AVCWfW+pmMAfimL0gc10YYtuWEEhmCE7fHpkb2Za16c/joOPsk+c1ykzNeOW0MHTPdFzK+vZyY7U/fqtq+R7OFwavU7AU8odZqT8BqbUm8pqytykpdyF7LegGvreOGYEkdXW0grqohB1q81dr4jOuTtnbIrlRf9NmJaAOVcTO8gTbTCOXyq/GtMM5PETGedIPc37b9aE/NoIdl4jDyRd9WqLvPcHxetzvbLL40swZe6o3aSjD9Zv3yMso9ADoyY9or7sBKLkmbUi+1We9n34ezZ2QwMq4Umtd8fg56PxorEDMgEic+Mypeci/GNr5OvBYaGTY664vDgEJnvk5rlwxqjFNgGEtZJty1XxDSYK4tm16uUsArJcUXoEATaCiYlG2U/D+BZhenAqGBqH3JGD2uYwUxs6Tltse5EPgWqlTW2HXHFUYyoG1g8YNEJxowcaP4mfWYc31iGdb78oKzU8+izVnvF5YA57rj/h1q/dOMgi7VJqH+NOIQolrye2Zl+W9T2+6H1YRKb4z37bB8KhrcHp0zVOteeDfxXw+Ri8V9ahJFjo81tCZ8+7lLzqvz+7GVgbekq8zqcigYp0+bMGaRSu10g6jeAp/mof+R9MfQ==";
        $tpvv = new Pasarela('Laravel',1);
        $tpvv->SetREQUEST('');
        $this->assertEquals(false,$tpvv->ValidateRequest());
        $tpvv->SetREQUEST($request);
        $this->assertEquals(true,$tpvv->ValidateRequest());



    }
}


