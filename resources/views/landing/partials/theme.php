<h1 class="title">Theme Picker</h1>
<p class="subtitle">
    Pick the theme you like to use below.<br />
</p>

<div class="field is-grouped">
    <div class="control">
        <button class="button is-light" v-on:click="showPage('contact')">Back</button>
    </div>
</div>

<div class="columns is-multiline">
    <div class="column is-one-quarter" v-for="theme in themes">
        <img :src="'https://bootswatch.com/' + theme + '/thumbnail.png'" 
            v-on:click="selectTheme(theme)"
            class="img-theme-preview">
    </div>
</div>