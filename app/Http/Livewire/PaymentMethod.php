<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMethod extends Component
{


    // public function getdefaultPaymentMethodProperty(){
    //     return auth()->user()->defaultPaymentMethod();
    // }


    //TODOS LOS METODOS DE PAGO SON UNICOS

    //Funcion para agregar un metodo de pago recibe un id
    public function addPaymentMethod($metodoPago){

        auth()->user()->addPaymentMethod($metodoPago);
        //Comprobamos si tiene ya un metodo de pago predeterminado , si no lo tiene asignamos este metodo de pago en el predeterminado

        if(!auth()->user()->hasDefaultPaymentMethod()){
            auth()->user()->updateDefaultPaymentMethod($metodoPago);

        }

    }

    //Funcion para eliminar un metodo de pago recibe un id
    public function deletePaymentMethod($metodoPago){
        auth()->user()->deletePaymentMethod($metodoPago);
    }


    //Funcion para determinar un metodo de pago como favorito
    public function defaultPaymentMethod($metodoPago){
        //Es un metodo que actualizara el metodo de pago favorito
        auth()->user()->updateDefaultPaymentMethod($metodoPago);

    }


    public function render()
    {
        return view('livewire.payment-method' , [
            'intent' => auth()->user()->createSetupIntent(),
            'metodosPagos' => auth()->user()->paymentMethods(),
            //ESTO ME GENERA UN OBJETO DE TIPO USER QUE HARA UN INTENTO PARA CREAR UN METODO  DE PAGO
            //ES NECESARIO CON SI O SI CON STRIPE
            //ES DECIR AVISAMOS A STRIPE QUE EL USUARIO LOGUEADO ESTA INTENTANDO HACER UN INTENTO DE ACTUALIZACION
        ]);
    }
}
