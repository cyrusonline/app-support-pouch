<div data-page="request_support" class="page cached">
    <div class="page-content">


      <div class="content-block">

                For urgent IT/AV support, please call <a href="tel:39635160">160.</a>
          </div>

          <form class="list-block">

          <ul>
            <li v-show="selectedSupport.id == 3">
              <!-- show if this is event -->
              <div class="item-content">
                <div class="item-media"><i class="icon f7-icons">star</i></div>
              <div class="item-inner">
                <div class="item-title label">Event</div>
                <div class="item-input">
                <input  type="text" placeholder="Enter the title of event" v-model="request.event_title" >
                </div>
              </div>
              </div>
            </li>
          <li v-show="selectedSupport.id == 3">
              <div class="item-content">
                <div class="item-media"><i class="icon f7-icons">time</i></div>
                  <div class="item-inner">
                  <div class="item-title label">Time</div>
                  <div class="item-input">
                     <input type="datetime-local" placeholder=""  v-model="request.image">
                     <!-- <input type="date" placeholder="Your birth date" id="calendar-default" v-model="request.event_time"> -->
                  </div>
                </div>
              </div>
            </li>
<!-- testing below -->
            <!-- <li>
              <div class="item-content">
                <div class="item-media"><i class="icon f7-icons">navigation</i></div>
          <inputlocation></inputlocation>

              </div>
            </li> -->
<!-- testing above -->
<li>
  <div class="item-content">
    <div class="item-media"><i class="icon f7-icons">navigation</i></div>
    <div class="item-inner">
      <div class="item-title label">Location</div>
      <div class="item-input">
      <input v-validate="'required'" name = "location" type="text" placeholder="Enter the location" v-model="request.location"
      @keydown.down = 'down'
      @keydown.up = 'up'
      @input = 'change'
      @keydown.enter = 'enter'
      @keydown.esc = 'open = false'
      @blur = 'open = false'
      >

      </div>
    </div>

  </div>
  <li v-show="errors.has('location')"><span  style="
  display: block;
	font-size: 0.75rem;
	margin-top: 0.25rem;
color: #ff3860 !important;
  ">{{errors.first('location')}}</span></li>
</li>
<ul v-show = "openSuggestion" class="dropdown-menu" style="width:100%" >
  <li  v-for="(suggestion,index) in filtered_locations"   style="text-align: center;cursor:pointer;" v-bind:class="{'active': isActive(index)}"
  @click = "suggestionClick(index)"
  @mousedown="suggestionClick(index)">
     {{suggestion.shortname}}
  </li>
</ul>
              <li  v-show="selectedSupport.id == 3">
              <div class="item-content">
                  <div class="item-media"><i class="icon f7-icons">navigation</i></div>
                    <div class="item-inner">
                    <div class="item-title label">Other Location</div>
                    <div class="item-input">
                    <input type="text" placeholder="Enter other location" class="" v-model="request.other_location">
                    </div>
                  </div>
                </div>
                </li>
            <li  v-show="selectedSupport.id != 4"><a href="#" class="item-link smart-select">
                <select name="car" multiple="multiple"  v-model="request.support_items_needed">
                  <optgroup v-for="category in supported_cateories" :label="_.startCase(category.category_name)" >
                    <option v-for="item in supported_items" v-if="item.category_id == category.category_id"  :value="item.id">{{item.item_name}} </option>

                  </optgroup>


                </select>
                <div class="item-content">
                  <div class="item-media"><i class="icon f7-icons">help</i></div>
                  <div class="item-inner">
                    <div class="item-title">Support needed</div>
                    <div class="item-after"></div>
                  </div>
                </div>
                </a>
              </li>
              <li class="align-top">
              <div class="item-content">
                  <div class="item-media"><i class="icon f7-icons">compose</i></div>
                <div class="item-inner">
                <div class="item-title label">Details</div>
                  <div class="item-input">
                  <textarea v-validate="'required'" class="resizable" placeholder="Enter details" v-model="request.details" name="details"></textarea>
                  </div>
                </div>
              </div>
              </li>

             <!-- <li><a href="campus.php" class="item-link">
                      <div class="item-content">
                    <div class="item-media"><i class="icon f7-icons">camera</i></div>
                      <div class="item-inner">
                        <div class="item-title">Take Photo</div>
                      </div>
              </div></a></li>
              <li>
                       <div class="item-content">
                     <div class="item-media"><i class="icon f7-icons">camera</i></div>
                       <div class="item-inner">
                         <div class="item-title label">Take Photo</div>
                         <div class="item-input">
                         <input type="file" name="image" @change="imageChanged"> -->
                         <!-- <input type="file" change="imageChanged"> -->

                          <!-- <input type="file" v-model="request.image"> -->
                         <!-- </div>
                       </div>
               </div></li> -->
          </ul>
            <div class="content-block">
            <div class="row">
            <div class="col-50"><a href="#" class="button button-big button-fill color-green" @click="validateFormBeforeSubmit">Submit</a></div>
            

            <div class="col-50"><a href="#" class="button button-big button-fill color-red">Cancel</a></div>
            </div>
            </div>
          </form>

    </div>
</div>
