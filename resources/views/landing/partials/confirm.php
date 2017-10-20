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

<div class="field is-grouped">
  <div class="control">
    <button class="button is-light" v-on:click="showPage('theme')">Back</button>
    <button class="button is-link" v-on:click="submit()">Submit</button>
  </div>
</div>
