const app = new Vue({
    el: '#apiproduct',
    data: {
        nombre: '',
        nameTemp: '',
        slug: '',
        div_mensaje_slug: 'Existing',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        disable_button: 1,

        /* Product Variables */
        price_old: 0,
        price: 0,
        promo: 0,
        promo_price: 0,
        promo_message: '0'
    },
    computed: {
        generarSLug : function(){
            var char= {
                "á":"a","é":"e","í":"i","ó":"o","ú":"u",
                "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                "ñ":"n","Ñ":"N"," ":"-","_":"-"
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g;
            this.slug = this.nombre.trim().replace(expr, function(e){
                return char[e]
            }).toLowerCase()
            return this.slug;
            //return this.nombre.trim().replace(/ /g,'-').toLowerCase()
        },

        generardescuento: function () {

            if (this.promo_price > 100) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Do not enter a value greater than 100.!',
                });

                this.promo_price = 100;
                this.promo = this.price_old * this.promo_price / 100;
                this.price = this.price_old - this.promo;
                this.promo_message = 'This product is free';

                return this.promo_message;

            } else if (this.promo_price < 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Do not enter a value less than 0.!',
                });

                this.promo_price = 0;
                this.promo = this.price_old * this.promo_price / 100;
                this.price = this.price_old - this.promo;
                this.promo_message = '';

                return this.promo_message;

            } else if (this.promo_price > 0) {
                this.promo = this.price_old * this.promo_price / 100;
                this.price = this.price_old - this.promo;

                if (this.promo_price >= 100) {
                    this.promo_message = 'This product is free';
                } else {
                    this.promo_message = 'There is promo of $US' + this.promo;
                }
                return this.promo_message;
            } else {
                this.promo = '';
                this.price = this.price_old;
                this.promo_message = '';

                return this.promo_message;
            }
        }
    },
    methods: {
        getproduct() {
            if (this.slug) {
                let url = '/api/product/' + this.slug;
                axios.get(url).then(response => {
                    this.div_mensaje_slug = response.data;
                    // console.log(this.div_mensaje_slug);
                    if (this.div_mensaje_slug === 'Available') {
                        this.div_clase_slug = 'badge badge-success';
                        this.disable_button = 0;
                    } else {
                        this.div_clase_slug = 'badge badge-danger';
                        this.disable_button = 1;
                    }
                    this.div_aparecer = true;
                });
            } else {
                this.div_clase_slug = 'badge badge-success';
                this.div_mensaje_slug = 'Write product';
                this.disable_button = 1;
                this.div_aparecer = true;
            }
        }
    },
    mounted() {
        if (data.edit == 'Si') {
            this.nombre = data.datos.name;
            this.price_old =  data.datos.price_old;
            this.promo_price = data.datos.promo_percent;
            this.disable_button = 0;
        }

        console.log(data);
    }
});
