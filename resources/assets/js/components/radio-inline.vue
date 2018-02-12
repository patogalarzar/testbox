<template>
  <div class="panel panel-success">
    <div class="panel-heading">
      Radio
    </div>
    <div class="panel-body">
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 1
      </label>
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 2
      </label>
      <label class="radio-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 3
      </label>
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
