<template>
  <div class="panel panel-success">
    <div class="panel-heading">
      Radio
    </div>
    <div class="panel-body">
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
          Option one.
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
          Option two.
        </label>
      </div>
      <div class="radio disabled">
        <label>
          <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
          Option three disabled.
        </label>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Radio component mounted.')
        }
    }
</script>
