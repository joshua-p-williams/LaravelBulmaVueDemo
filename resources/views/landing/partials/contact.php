<h1 class="title">Laravel Bulma Vue Demo</h1>
<p class="subtitle"> 
    Demonstrate a simple vue / bulma app within laravel!
</p>

<div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" type="text" placeholder="Enter your name" v-model="selected.name">
  </div>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" type="email" placeholder="Enter your email"  v-model="selected.email">
    <span class="icon is-small is-left">
      <i class="fa fa-envelope"></i>
    </span>
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link" v-on:click="showPage('theme')">Next</button>
  </div>
</div>