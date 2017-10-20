<h1 class="title">
    Confirm
</h1>
<p class="subtitle">
    Thanks <span v-text="selected.name"></span>!  Confirm your selections below!
</p>

<div class="columns">
    <div class="column">
        <img :src="'https://bootswatch.com/' + selected.theme + '/thumbnail.png'">
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
