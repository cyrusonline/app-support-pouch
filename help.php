<div data-page="help" class="page cached">
    <div class="page-content">
        <div class="content-block-title">Classroom support</div>
        <div class="list-block">
            <ul>
            <contact-group
              v-for="school in schools"
              :favorite="school.favorite"
              :key="school.id"
              :fullname ="school.shortname"
              @removefavorite ="removeFavorite(school)"
              @addfavorite = "addFavorite(school)"
              @click.native="selectGroup(school)"
            ></contact-group>

            </ul>
        </div>
        <div class="content-block-title">Departments</div>
        <div class="list-block">
            <ul>

              <contact-group
                v-for="department in departments"
                :favorite="department.favorite"
                :key="department.id"
                :fullname ="department.shortname"
                @removefavorite ="removeFavorite(department)"
                @addfavorite = "addFavorite(department)"
                @click.native="selectGroup(department)"
              ></contact-group>



            </ul>
        </div>

    </div>
</div>
