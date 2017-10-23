<h1 class="title">Upload Images</h1>
<p class="subtitle">
    Upload any images you would like to be used on your site.
</p>

<div class="file has-name">
  <label class="file-label">
    <input class="file-input" type="file" id="imageToUpload" v-on:change="uploadImage">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fa fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
    <span class="file-name" v-text="lastImageName" v-if="lastImageName"></span>
  </label>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link" v-on:click="showPage('done')" :disabled="submitting">Done</button>
  </div>
</div>


<div class="notification is-danger" v-if="errorMessage">
    <strong v-text="errorMessage"></strong>
    <ul v-if="errorDetails">
        <li v-for="error in errorDetails" v-text="error"></li>
    </ul>
</div>

<div class="columns is-multiline">
    <div class="column is-one-quarter" v-for="image in images">
        <img :src="'/images/' +  image.filename" 
            class="img-theme-preview">
    </div>
</div>