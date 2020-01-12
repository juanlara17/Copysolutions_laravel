const app = new Vue({
    el: '#apicategory',
    data: {
        nombre: 'Jhonatan Fernández',
        slug: '',
        div_mensaje_slug: 'Existing',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        disable_button: 0
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
        }
    },
    methods: {
        getCategory() {
            if (this.slug) {
                let url = '/api/store/' + this.slug;
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
                this.div_mensaje_slug = 'Available';
                this.disable_button = 1;
                this.div_aparecer = true;
            }
        }
    }
});