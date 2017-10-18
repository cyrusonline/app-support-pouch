Vue.component('contact-group',{
props:[
'favorite',
'fullname',

],

data(){
  return{
    fillstar:''
  }
},


template:`


<li >

  <div class="item-content item-before-details" @click="togglestar" style="cursor: pointer">
  <span class="f7-icons color-yellow item-before-icon" v-if="fillstar">star_fill</span>
  <span class="f7-icons color-yellow item-before-icon" v-else>star</span>
  </div>

  <a href="#staffgroup" class="item-link">

      <div class="item-content">
          <div class="item-inner">
              <div class="item-title">{{fullname}}</div>
          </div>
      </div>
  </a>
</li>



`,
methods:{
  togglestar(){
    var self = this;
    if (this.fillstar == true) {
      myApp.confirm('', 'Remove from favorite?',function () {
      self.fillstar = false
      self.$emit('removefavorite')
   });
    }else{
      myApp.confirm('','Add to favorite?', function () {
        self.fillstar = true
        self.$emit('addfavorite')
   });

    }



  }

},
watch:{
  favorite: function(){
    if (this.favorite == true) {
      this.fillstar = true
    }else{
      this.fillstar = false
    }
  }
},
created(){
  this.fillstar = this.favorite;
  //favorite from the parent should be the same as the favorite in component
}


})
