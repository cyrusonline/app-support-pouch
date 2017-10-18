Vue.component('inputlocation',{
  props:[
  'childsearchtext',

  ],
  data(){
    return {
      newsearchtext:''
    }
  },
  template:`

  <div class="item-inner">
    <div class="item-title label">Location</div>
    <div class="item-input">
    <input type="text" placeholder="Enter the location">
    </div>
  </div>



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
