<template>
<div id="modal">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" @click="showModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" v-bind:class="{ 'in':show, }" v-bind:style="modal" @click="showModal">
    <div class="modal-dialog" v-bind:style="modal_dialog" @click.stop="">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" @click="showModal"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modal Bootstrap - Vue</h4>
        </div>
        <div class="modal-body">
          Bootstrap modal triggered by vue
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum.<br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum.<br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum.<br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum.<br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
          nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
          deserunt mollit anim id est laborum.<br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" @click="showModal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
        data: function () {
          return{
            show: false
          }
        },
        methods:{
          showModal: function() {
              this.show = !this.show;
          }
        },
        computed: {
          modal() {
            if (this.show) {
              return {
                'display': 'block',
                'padding-left':'10px',
                'overflow-x': 'hidden',
                'overflow-y': 'auto',
                'background-color': 'rgba(0,0,0,0.5)'
              }
            } else {
              return {}
            }
          },
          modal_dialog() {
            if (this.show) {
              return {
                'transition': 'transform .3s ease-out'
              }
            }else{
              return {}
            }
          }
        },
        mounted() {
            console.log('Radio component mounted.')
        }
    }
</script>
