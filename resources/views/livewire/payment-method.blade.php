<div>
    {{-- Because she competes with no one, no one can compete with her. --}}


    <section class="bg-white rounded shadow-lg mb-12">
        <div class="container-lg px-4 py-6"> <!-- Modificación: container-lg -->
            <h1 class="text-gray-700 text-xl font-semibold mb-4">Agregar Método de Pago</h1>
            <div class="row">
                <div class="col ">
                    <p class="text-gray-600 mr-6">Información de tarjeta</p>
                    <div class="flex-1">
                        <input id="card-holder-name" class="form-control mb-4" placeholder="Nombre del Titular de la Tarjeta">
                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element" class="form-control mb-2"></div>
                        {{-- MENSAJE DE ERROR --}}
                        <span id="card-error-message" class="text-red-600 text-sm"></span>
                    </div>
                </div>
            </div>
        </div>
        <footer class="px-4 py-6 bg-gray-50 border-t border-gray-200">
                <div class="row justify-content-end">
                    <div class="col ">
                        <button id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-primary w-100" style="background-color: #72C3DC">Update Payment Method</button>
                    </div>
                </div>
        </footer>
    </section>









    {{-- EL SPINNER SOLO APARECERA CUANDO SE INICIE EL METODO addPaymentMethod Y CUANDO ESTE CARGANDO --}}
    <div class="mb-12  justify-center" wire:target="addPaymentMethod" wire:loading.flex>
        <div class="spinner-border text-info" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
    </div>

    @if (count($metodosPagos))

        <section class="bg-white rounded shadow-lg">
            <header class="px-8 py-6 gray-50 border-b border-gray-200">
                <h1 class="text-gray-700 text-lg font-semibold">Metodos de pago agregados</h1>
            </header>



            <div class="px-8 py-6">
                <ul class="divide-y divide-gray-200">
                    @foreach ($metodosPagos as $metodoPago)
                        {{-- Para evitar que se equivoque livewire al eliminar una tarjeta porque son iguales hay que ponerle un key --}}
                        <li class="py-2 flex justify-between" wire:key="{{$metodoPago->id}}">
                            <div>
                                <p>

                                    <span class="font-semibold">{{ $metodoPago->billing_details->name }}</span>xxxx-{{ $metodoPago->card->last4 }}

                                    @if (auth()->user()->defaultPaymentMethod()->id == $metodoPago->id)
                                    {{-- @if ($this->defaultPaymentMethod->id == $metodoPago->id) --}}
                                    <span class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Predeterminado</span>
                                    @endif


                                </p>
                                <p>Expira : {{ $metodoPago->card->exp_month }}/ {{ $metodoPago->card->exp_year }}</p>
                            </div>

                            @if (auth()->user()->defaultPaymentMethod()->id != $metodoPago->id)
                            <div class="flex space-x-4">
                                <button class="disabled:opacity-25"
                                    wire:click="defaultPaymentMethod('{{ $metodoPago->id }}')"
                                    wire:target="defaultPaymentMethod('{{ $metodoPago->id }}')"
                                    wire:loading.attr="disabled">
                                    <i class="fa-regular fa-star">
                                    </i>
                                </button>


                                <button class="disabled:opacity-25"
                                    wire:click="deletePaymentMethod('{{ $metodoPago->id }}')"
                                    wire:target="deletePaymentMethod('{{ $metodoPago->id }}')"
                                    wire:loading.attr="disabled">
                                    {{-- ME ESTA RETORNANDO UNA CADENA Y ESO HAY QUE PONERLO ENTRE COMILLAS --}}
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                            @endif



                        </li>
                    @endforeach
                </ul>
            </div>



        </section>

    @endif







    {{-- CODIGO JS DE STRIPE --}}
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        //HAY Q PONERLO ENTRE COMILLAS PORQUE ES UNA CADENA Y SINO PETA
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');
    </script>


    <script>
        //RECUPERA LO QUE TENGAMOS EN EL CARD NAME Y EL BOTON
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');



        //HARA UN PETICION A STRIPE CUANDO HAGA UNA CLICK EN UN BOTON , NOS DEVOLVERA UNA RESPUESTA DE SETUPINT Y ERROR
        cardButton.addEventListener('click', async (e) => {

            //Deshabilitar el boton

            cardButton.disabled = true

            //ESTO RECUPERARA EL ATRIBUTO DATA->SECRET
            const clientSecret = cardButton.dataset.secret;

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement, //ESTO ES EL NUMERO DE TARJETA
                        billing_details: {
                            name: cardHolderName.value //NOMBRE DEL TITULAR
                        }
                    }
                }
            );


            cardButton.disabled = false



            if (error) {
                // Display "error.message" to the user...
                let span = document.getElementById('card-error-message')
                span.textContent = error.message
            } else {
                // The card has been verified successfully...

                //esto de abajo me trae una id que asigna el payment.method , son unicas
                // console.log(setupIntent.payment_method);


                //Limpiar formulario
                cardHolderName.value = '';
                cardElement.clear();

                //Esta es la forma de ejecutar metodos de livewire pero desde js
                @this.addPaymentMethod(setupIntent.payment_method);


            }
        });
    </script>

</div>
