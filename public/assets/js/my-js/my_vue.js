
$(function () {



})
// GET PALAVRAS E RETORNA PALAVRAS
function getAllWords() {


    return new Promise(function (resolve, reject) {

        $.ajax({
            url: '/get-palavras',
            type: 'get',
            data: {},
            dataType: 'json',
            success: function (response) {

                resolve(response)
            }
        })

    })

}

getAllWords().then((data) => {

    root.getAllWords(data.data)
})







//COMPONENTES

Vue.component('table-input-dynamic', {

    props: [
        'data',
        'columns',
        'nameinputs'
    ],
    template:
        `
         <table class="table table_input_dynamic">
            <thead>
                <tr>
                    <th scope="col" v-for="column of columns">
                        <span> {{ column.display }} </span>
                    </th>
                    <th scope="col"> Acções</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item of data">
                <td>
                    {{ item.field }}
                    <input type="hidden" :name="nameinputs" :value=" item.value ">
                </td>
                <td class="">
                    <button class="btn-accoes" type="button" @click="edit(item)">
                        <i class="ri-edit-box-line"></i>
                    </button>
                        <button class="btn-accoes" type="button" @click="del(item)">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                </td>
                </tr>
            </tbody>
        </table>


    `,

    methods: {

        edit: function (item) {

            this.$emit('edit_item', item)
        },
        del: function (item) {
            this.$emit('delete_item', item)
        }
    }
});


// CRIAR COMPONENTES PARA LISTAR DEFINIÇÃO E EXEMPLOS

Vue.component(
    'lista-definicao',
    {

        props: [
            "data",
            "columns",

        ],
        template: `
            <div>
                <div v-for="item of data" class="item-lista-definicao">
                    <div class="col-md-12">
                        <h5>Definição</h5>
                        <p> {{ item.definicao }}</p> 
                        <input type="" name="definicaoTermos[['definicao']]" :value="item.definicao">
                        <h5>Exemplo</h5>
                        <p> {{ item.exemplo }}</p>  
                        <button class="btn-accoes" type="button" @click="delete_item(item)">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                </div>
            </div>
        
        `,
        methods: {
            delete_item: function (item) {
                this.$emit('delete_item', item)
            }
        }
    }
);

Vue.component('select-dynamic', {

    props: [
        'data',
        'params',
        'id'
    ],
    template:
        `
        <select class="form-select select_dynimic" :id="id">

                <option v-for="word of data ">{{ word.nome}} </option>
        </select>


    `,

    methods: {
    }
});
/*
Vue.component(
    'table-palavra-outro',
    {
        props: [

        ],
        template:
        `

        `,
          methods:{
            del: function(item){
                this.$emit('delete_item',item)
            }
     }
    }
);
*/



let form = [];
let update = false;
const root = new Vue({
    el: '#app',
    data: {

        //DEFINCIÇÃO
        definicao: 'Definicao',
        definition: '',
        definitions: [],
        updateButton: false,
        updatedefinition: null,
        columnsDefinitions: [
            {
                'id': 'definicao',
                'display': 'Definição'
            },
        ],

        //EXEMPLO
        exemplo: 'Exemplo',
        exemple: '',
        exemples: [],
        updateButtonExemple: false,
        updatedeExemple: null,
        columnsExemples: [
            {
                'id': 'exemplo',
                'display': 'Exemplo'
            },
        ],

        //SINONIMO
        _sinonimo: 'Definicao',
        sinonimo: '',
        sinonimos: [],
        updatesinonimo: null,
        columnsSinonimos: [
            {
                'id': 'sinonimo',
                'display': 'Sinônimo'
            },
        ],
        //ANTONIMOS
        _sinonimo: 'Antonimo',
        antonimo: '',
        antonimos: [],
        updatesinonimo: null,
        columnsAntonimos: [
            {
                'id': 'antnimo',
                'display': 'Antônimo'
            },
        ],
        
        //Terminologia

        //DEFINCIÇÃO
        definicaoTermo: 'Definicao',
        definitionTermo: '',
        definitionsTermo: [],
        updateButtonTermo: false,
        updatedefinitionTermo: null,
        columnsDefinitionsTermo: [
            {
                'id': 'definicao',
                'display': 'Definição'
            },
        ],

        exemploTermo: 'Exemplo',
        exempleTermo: '',
        exemplesTermo: [],
        updateButtonExempleTermo: false,
        updatedeExempleTermo: null,
        columnsExemplesTermo: [
            {
                'id': 'exemplo',
                'display': 'Exemplo'
            },
        ],
        //Palavras
        words: [],


        // DEFINIÇÃO DE TERMOS 
        definicaoTermos: { 'definicao': 'definição', 'exemplo': 'exemplo' },
        definicoesTermos: [],
        inputs:[],
        definicaoTermosForm:[],
        columnsDefinicaoTermos: [
            "id",
            "Definição",
            "Exemplo"
        ],
    },
    methods: {


        addDefinicaoTermos: function () {
            let id = 1;

            // VERIFCIA SE UM DOS CUMBOS ESTA VAZIO
            if (this.definicaoTermos.definicao.trim() == '' || this.definicaoTermos.exemplo.trim() == '') {
                return false;
            }

            // RECUPERA O ULTIMO EMENTO DA LISTA DE DEFINIÇÃO DE TERMOS
            let ultimoElemnto = this.definicoesTermos[this.definicoesTermos.length - 1];

            // VERIFICA SE EXISTE O ULTIMO ELEMENTO
            if (ultimoElemnto) {
                id = ultimoElemnto.id + 1;
            }
            // CRIA ID
            this.definicaoTermos.id = id;

            // ADICIONAR NO ARRAY   
            this.definicoesTermos.push({ "id": this.definicaoTermos.id, "definicao": this.definicaoTermos.definicao, "exemplo": this.definicaoTermos.exemplo });

            this.inputs.push(
                `<input name="definicao" value="" />`
            )

            console.log(this.inputs)
            // ZERAR OS CAMPOS
            this.definicaoTermos.definicao = '';
            this.definicaoTermos.exemplo = '';
            return false;
        },
        deleteDefinicaoTermos: function (v) {

            // RETORNA A POSIÇÃO DO ELEMENTO PRETENDIDO
            const index = this.definicoesTermos.findIndex(item => item.id == v.id);
            this.definicoesTermos.splice(index, 1)
        },

        addDefinition: function () {
            let id = 1;

            if (this.definition.trim() == '') {
                return false;
            }
            let ultimoElemnto = this.definitions[this.definitions.length - 1];

            if (ultimoElemnto) {
                id = ultimoElemnto.id + 1;
            }
            this.definitions.push({ 'id': id, 'field': this.definition, 'value': this.definition })
            this.definition = '';
            return false
        },

        editDefinition: function (value) {
            this.updateButton = true;

            this.definition = value.field;
            this.updatedefinition = value;
        },
        updateDefinition: function () {
            if (this.definition.trim() == '') {
                this.updateButton = false;
                return false;
            }

            this.updateButton = false;
            this.definitions.map((value) => {

                if (value.id == this.updatedefinition.id) {
                    value.field = this.definition
                }
                return value;
            })
            this.definition = '';
        },
        deleteDefinition: function (v) {

            const index = this.definitions.findIndex(item => item.id == v.id);
            this.definitions.splice(index, 1)
        },


        /*EXEMPOS*/

        addExemple: function () {
            let id = 1;

            if (this.exemple.trim() == '') {
                return false;
            }
            let ultimoElemnto = this.exemples[this.exemples.length - 1];

            if (ultimoElemnto) {
                id = ultimoElemnto.id + 1;
            }
            this.exemples.push({ 'id': id, 'field': this.exemple, 'value': this.exemple })
            this.exemple = '';
            return false
        },

        editExemple: function (value) {
            this.updateButtonExemple = true;

            this.exemple = value.field;
            this.updatedeExemple = value;
        },
        updateExemple: function () {
            if (this.exemple.trim() == '') {
                this.updateButtonExemple = false;
                return false;
            }

            this.updateButtonExemple = false;
            this.exemples.map((value) => {

                if (value.id == this.updatedeExemple.id) {
                    value.field = this.exemple
                }
                return value;
            })
            this.exemple = '';
        },
        deleteExemple: function (v) {

            const index = this.exemples.findIndex(item => item.id == v.id);
            this.exemples.splice(index, 1)
        },

        //SINONIMOS
        addSinonimo: function () {

            let select = document.getElementById('sinonimo');
            let sinonimo = select.options[select.selectedIndex];
            let id = 1;
            if (this.sinonimo.value < 0) {
                return false;
            }

            sinonimoExiste = this.sinonimos.findIndex(item => item.id == sinonimo.value);
            if (sinonimoExiste != -1) {
                return false;
            }
            this.sinonimos.push({ 'id': sinonimo.value, 'field': sinonimo.text, 'value': sinonimo.value })
            //console.log(this.sinonimos[0].id);
            return false
        },

        deleteSinonimo: function (v) {

            const index = this.sinonimos.findIndex(item => item.id == v.id);
            this.sinonimos.splice(index, 1)
        },


        //ANTONIMO
        addAntonimo: function () {

            let select = document.getElementById('antonimo');
            let antonimo = select.options[select.selectedIndex];
            let id = 1;

            if (this.antonimo.value < 0) {
                return false;
            }

            antonimoExiste = this.antonimos.findIndex(item => item.id == antonimo.value);
            if (antonimoExiste != -1) {
                return false;
            }
            this.antonimos.push({ 'id': antonimo.value, 'field': antonimo.text, 'value': antonimo.value })
            return false
        },
        deleteAntonimo: function (v) {

            const index = this.antonimos.findIndex(item => item.id == v.id);
            this.antonimos.splice(index, 1)
        },


        // GET PALAVRAS

        getAllWords: function (words) {

            this.words = words
        },



        // TERMINOLOGIA

        addDefinitionTermo: function () {
            let id = 1;

            if (this.definitionTermo.trim() == '') {
                return false;
            }
            let ultimoElemnto = this.definitionsTermo[this.definitionsTermo.length - 1];

            if (ultimoElemnto) {
                id = ultimoElemnto.id + 1;
            }
            this.definitionsTermo.push({ 'id': id, 'field': this.definitionTermo, 'value': this.definitionTermo })
            this.definitionTermo = '';
            return false
        },

        deleteDefinitionTermo: function (v) {

            const index = this.definitionsTermo.findIndex(item => item.id == v.id);
            this.definitionsTermo.splice(index, 1)
        },

    },

    component: [
        'table-input-dynamic',
        'select-dynamic',
        'lista-definicao'
    ]

})
