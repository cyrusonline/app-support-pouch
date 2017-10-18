Vue.component('searchbar',{
  props:[
  'childsearchtext',

  ],
  data(){
    return {
      newsearchtext:''
    }
  },
  template:`

  <div class="typeahead">
  <form data-search-list=".list-block-search" data-search-in=".item-title" class="searchbar searchbar-init">

  <div class="searchbar-input" >
  <input id="tags" type="search"  :placeholder=childsearchtext
  @keydown.enter = "onEnterKey">
  <a href="#" class="searchbar-clear"></a>
  </div><a href=""  class="searchbar-cancel"><i class="f7-icons">close</i></a>
  </form>



</div>

  `,
  methods:{

    onEnterKey(event){
      if (/\S/.test(event.target.value)) {
        mainView.router.loadPage('#search');
        this.$emit('searchtextchanged',_.trim(event.target.value));
        this.$emit('getsearchresult');
      }
  

  },


  }
})
