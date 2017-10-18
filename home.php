<div data-page="index" class="page">
<div class="page-content">
  <div  v-if="userinfo.length" class="content-block"> {{task_id}} Welcome, {{userinfo[0].username}}</div>
  <!-- asdfasfsa -->
  <!-- <div class="content-block-title">Default setup</div>
  <div class="list-block">
    <ul>
      <li>
        <div class="item-content">
          <div class="item-inner">
            <div class="item-input">
              <input type="text" placeholder="Your birth date" readonly id="calendar-default">
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div> -->
  <!-- asdfsadf  -->


  <div>
       <div class="list-block">
       <ul>

       <li>
         <div class="item-content">
         <div class="item-inner">
           <div class="item-title label">Title</div>
           <div class="item-input" >
           <input v-model = "title" type="text" placeholder="Enter the task title" name="title" >

          

           </div>
           

         </div>


         </div>
       </li>
       <li>
         <div class="item-content">
         <div class="item-inner">
           <div class="item-title label">Detail</div>
           <div class="item-input" >
           <input v-model = "detail" type="text" placeholder="Enter the detail" name="title"   >

          

           </div>
           

         </div>


         </div>
       </li>
       </ul>
     </div>
     <div class="row">
  <div class="col-50">
    <a href="#" class="button button-big button-red" @click = "save">Save</a>
  </div>
  <div class="col-50">
    <a href="#" class="button button-big button-green">Cancel</a>
  </div>
  <br>
 
</div> 
     </div>
<!-- <div @click="showphoneinput=true"v-show="!showphoneinput" style="cursor:pointer" class="content-block">Mobile {{phone_number}} &nbsp&nbsp&nbsp <i class="f7-icons">compose</i></div> -->
<div class="list-block media-list">
<!-- {{tasks}} -->
    <ul>
  
    <li v-for="task in tasks" class="swipeout">
  <div class="swipeout-content">
    <a href="#" class="item-content item-link">
      <div class="item-inner">
        <div class="item-title-row">
          <div class="item-title">{{task.title}}</div>
          <div class="item-after">17:14</div>
        </div>
       
        <div class="item-text">{{task.detail}}</div>
      </div>
    </a>
  </div>
    <div class="swipeout-actions-right">
    <a href="#" class="mark bg-orange" @click = "edit(task)" >Edit</a>
    <a href="#" class="bg-red" @click="remove(task)">Delete</a>
  </div>
</li>
      
    </ul>
</div>
    



</div>
