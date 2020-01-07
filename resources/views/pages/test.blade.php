<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear categorias...</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>

</head>
<body>
<div class="container">
    <div id="app">
        <form action="">
            <h1>Crear Categoría</h1>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input v-model="nombre"

                       @blur="getCategory"
                       @focus="div_aparecer=false"

                       class="form-control" type="text" name="nombre" id="nombre">
                <label for="slug">Slug</label>
                <input readonly v-model="generarSLug"  class="form-control" type="text" name="slug" id="slug">
                <div v-if='div_aparecer' v-bind:class="div_clase_slug">
                    @{{ div_mensaje_slug }}
                </div>
                <br v-if='div_aparecer'>
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>

            </div>
            <input type="submit" value="Guardar" class="btn btn-primary float-right">
        </form>
        <br><br>

        @{{ nombre }}
        <br>
        @{{ generarSLug }}
        <br>
        @{{ slug }}
    </div>
</div>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            nombre: 'Jhonatan Fernández',
            slug: '',
            div_mensaje_slug: 'Slug Existente',
            div_clase_slug: 'badge badge-danger',
            div_aparecer: false
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
                let url = 'api/category/' + this.slug;
                axios.get(url).then(response => {
                    this.div_mensaje_slug = response.data;
                    // console.log(this.div_mensaje_slug);
                    if (this.div_mensaje_slug === 'Slug disponible') {
                        this.div_clase_slug = 'badge badge-success';
                    }else{
                        this.div_clase_slug = 'badge badge-danger';
                    }
                    this.div_aparecer = true;
                })
            }
        }
    });
</script>

</body>
</html>
