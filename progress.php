<div data-page="progress" class="page cached">
    <div class="page-content">

      <div class="content-block">
      <form class="searchbar">
          <div class="searchbar-input">
              <input type="search" placeholder="Search" v-model="search_myrequests">
              <a href="#" class="searchbar-clear"></a>
          </div>
          <a href="#" class="searchbar-cancel">Cancel</a>
      </form>
      <!-- Search Bar overlay-->
      <div class="searchbar-overlay"></div>
      <div class="content-block"></div>
        <div class="list-block media-list">
          <ul>
            <li v-for = "request in filtered_myrequests">
              <div><a href="#" class="item-link item-content">
                  <div class="item-inner">
                    <div class="item-title-row">
                      <div class="item-title">{{request.support_type_name}} (<span :class="request.status_id==1? 'progress-label-red':(request.status_id == 2? 'progress-label-blue':'progress-label-green')">{{_.capitalize(request.status)}}</span>)</div>
                      <div class="item-after">{{request.timecreated}}</div>
                    </div>
                    <div class="item-subtitle">{{request.location}}</div>
                    <div class="item-subtitle">{{request.items_needed}}</div>
                    <div class="item-text">{{request.details}}</div>
                  </div></a></div>
            </li>
            <!-- <li>
              <div><a href="#" class="item-link item-content">
                  <div class="item-inner">
                    <div class="item-title-row">
                      <div class="item-title">Office Support (<span class="progress-label-blue">Progress</span>)</div>
                      <div class="item-after">2017.05.06 17:14</div>
                    </div>
                    <div class="item-subtitle">D304</div>
                    <div class="item-subtitle">Computer, Monitor</div>
                    <div class="item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis tellus ut turpis condimentum, ut dignissim lac.</div>
                  </div></a></div>
            </li> -->


          </ul>
        </div>


      </div>







    </div>
</div>
