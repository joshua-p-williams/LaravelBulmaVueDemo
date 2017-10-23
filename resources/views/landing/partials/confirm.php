<h1 class="title">
    Confirm
</h1>
<p class="subtitle">
    Thanks <span v-text="selected.name"></span>!  Confirm your selections below!
</p>

<div class="columns">
    <div class="column is-half">
        <div class="card">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img :src="'https://bootswatch.com/' + selected.theme + '/thumbnail.png'">
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                            <img :src="'https://bootswatch.com/' + selected.theme + '/thumbnail.png'">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4"><span v-text="selected.name"></span></p>
                        <p class="subtitle is-6"><span v-text="selected.email"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="notification is-danger" v-if="errorMessage">
    <strong v-text="errorMessage"></strong>
    <ul v-if="errorDetails">
        <li v-for="error in errorDetails" v-text="error"></li>
    </ul>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-light" v-on:click="showPage('theme')">Back</button>
    <button class="button is-link" v-on:click="submit()" :disabled="submitting">Submit</button>
  </div>
</div>
