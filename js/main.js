
var vm = new Vue({
  el: '#app',
  db:null,
  


  data() {
    return {
      title:'',
      detail:'',
      tasks:[],
      task_id:'',
      task:[],
      phone_number:'',
      current:0,
      selectedSupport:[],
      supported_cateories:[],
      supported_items:[],
      locations:[],
      rooms:[],
      loading: false,
      number:'',
      list:[],
      number:1,
      show:false,
      userinfo:[],
      support_types:[],
      showphoneinput:true,
      request:{
        event_title:'',
        time:'',
        location:'',
        other_location:'',
        support_items_needed:[],
        details:'',
        image:''

      },
      filtered_locations:[],
      request_location:'',
      open:false,
      myrequests:[],
      search_myrequests:''






    }
  },

methods:{
  remove(task){
    // alert('delete');
    console.log(task)
    // this.db.remove(task);
    // this.refresh();
    this.db.remove(task,(err,result)=>{
      if (!err) {
        alert('Task deleted successfully');
        this.refresh();
      }
    })

  },
 
  edit(task){
    alert('edit');
    // this.task_id = task._id;
    this.task = task;
    this.title = task.title;
    this.detail = task.detail;
    if (task) {
      console.log(task);
    }
   
  },
  refresh(){
    this.tasks = [];
    this.db = new PouchDB('my_database');
    
   this.db.allDocs({include_docs:true},(err,result) => {
     if (!err) {
       let rows = result.rows;
      for (let i = 0; i < rows.length; i++) {
        this.tasks.push(rows[i].doc);

        
      }

       console.log(rows);
     }
   })
    
  },
  save(){
    alert('save');
   if (this.task) {
     console.log('editing a task')
     this.db.put({
      // _id: doc._id, if use post, no need to generate id, if use put, need to generate id by yourselves
      _id:this.task._id,
      _rev:this.task._rev,
      title: this.title,
      detail:this.detail
    }).then(function (response) {
      // handle response
    }).catch(function (err) {
      console.log(err);
    });
    
    this.refresh();

   } else {
    this.db.post({
      // _id: doc._id, if use post, no need to generate id, if use put, need to generate id by yourselves
    
      title: this.title,
      detail:this.detail
    }).then(function (response) {
      // handle response
    }).catch(function (err) {
      console.log(err);
    });
    
    this.refresh();
   }



  },
  say: function (msg) {
    // this function can be removed
  myApp.alert(msg)

  console.log(msg);

},



},
watch:{
 
},
created(){
  self = this;
  this.db = new PouchDB('my_database');
  // this.refresh();
  this.db.allDocs({include_docs:true},(err,result) => {
    if (!err) {
      let rows = result.rows;
     for (let i = 0; i < rows.length; i++) {
       this.tasks.push(rows[i].doc);
       
     }

      console.log(rows);
    }
  })
  var promise1 = this.$http.post('?action_id=getSupportType')
    .then(response => {

      let result = response.data.Rows;


      self.$data.support_types = result;



    }, {
      headers: {
        'X-CSRF-Token': undefined
      }
    }).catch(function(){



    })


    var promise2 = this.$http.post('?action_id=getUserInfo')
      .then(response => {

        let result = response.data.Rows;


        self.$data.userinfo = result;



      }, {
        headers: {
          'X-CSRF-Token': undefined
        }
      }).catch(function(){



      })

      // Promise.all([promise1,promise2]).then(function(){
      //   alert('Promise finished')
      // })


      this.$http.post('?action_id=getUserProfile')
        .then(response => {

          let result = response.data.Rows[0].phone;


          self.$data.phone_number = result;

          if (this.phone_number !=0 || this.phone_number != '' ) {

            this.showphoneinput = false
            // alert('fetched')
            // this.showphoneinput = true
          }

        }, {
          headers: {
            'X-CSRF-Token': undefined
          }
        }).catch(function(){



        })








    this.$http.post('?action_id=getContactFavourite')
      .then(response => {

        let result = response.data.Rows;

        self.$data.favorites = result;

        this.favoriteString = JSON.stringify(result);


      }, {
        headers: {
          'X-CSRF-Token': undefined
        }
      }).catch(function(){

      })





},


		  computed: {

        openSuggestion(){
          return this.request.location !== ""&& this.open === true;
        },
        progressClass(){
            return{
              'progress-label-blue':this.status_id == 1,
              'progress-label-red':this.status_id == 2,

            }
        },

        filtered_myrequests(){
          const exp = new RegExp(this.search_myrequests,'i')
          return this.myrequests.filter((myrequest)=>{
            return (exp.test(myrequest.location)|| exp.test(myrequest.items_needed)||exp.test(myrequest.details))
          })
        }







		  },


})
