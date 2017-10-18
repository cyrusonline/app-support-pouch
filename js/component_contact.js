
Vue.component('contact',{
props:[
'favorite',
'displayname',
'displaychinesename',
'room',
'ext',
'email',
'employment',
'department'

],

data(){
  return{
    fillstar:''
  }
},


template:`
<li  >
  <div class="item-content item-before-details" @click="togglestar" style="cursor: pointer">
  <span class="f7-icons color-yellow item-before-icon" v-if="fillstar">star_fill</span>
  <span class="f7-icons color-yellow item-before-icon" v-else>star</span>
    </div>

  <a href="#detail" class="item-link item-content" oncontextmenu="return false;">
    <div class="item-inner" >
    <div class="item-title-row">
      <div class="item-title">{{displayname}} {{displaychinesename}}</div>
    </div>
    <div class="item-subtitle employment_title"><span v-if="employment != ''">{{employment}}</span><span v-if="department != ''"> @ {{department}}</span></div>
    <div class="item-subtitle"><span v-if="room != ''">{{room}}</span> <span v-if="ext!=''" class="link external"> , Ext. 39635-{{ext}}</span></div>
    <div class="item-subtitle" v-if="email !=null">Email: <span class="link external">{{email}}</span></div>
    </div>
  </a>


</li>

`,
methods:{
  togglestar(){
    var self = this;
    if (this.fillstar == true) {
      myApp.confirm('', 'Remove from favorite?', function () {
      self.fillstar = false
      self.$emit('removefavorite')
   });
    }else{
      myApp.confirm('', 'Add to favorite?', function () {
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
}


})
