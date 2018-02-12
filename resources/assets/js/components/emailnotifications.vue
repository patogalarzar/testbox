<template>
  <div id="emails" class="anamnesis-card">
    <!-- Modal -->
    <div class="modal fade" v-bind:class="{ 'in':show }" v-bind:style="modal" @click="showModalNew">
      <div class="modal-dialog" v-bind:style="modal_dialog" @click.stop="">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" @click="showModalNew"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Email</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">

                <div class="form-group">
                  <label for="date" class="col-md-3 control-label">Fecha:</label>

                  <div class="col-md-7">
                    <input type="date" id="date" name="date" class="form-control" v-model='email.date' required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="from" class="col-md-3 control-label">From:</label>

                  <div class="col-md-7">
                    <input itype="email" id="from" name="from" class="form-control" v-model='email.from' required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="to" class="col-md-3 control-label">To:</label>

                  <div class="col-md-7">
                    <input itype="email" id="to" name="to" class="form-control" v-model='email.to' required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="cc" class="col-md-3 control-label">Cc:</label>

                  <div class="col-md-7">
                    <input itype="email" id="cc" name="cc" class="form-control" v-model='email.cc' required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="subject" class="col-md-3 control-label">Subject:</label>

                  <div class="col-md-7">
                    <input itype="text" id="subject" name="subject" class="form-control" v-model='email.subject' required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="message" class="col-md-3 control-label">Message:</label>

                  <div class="col-md-7">
                    <textarea id="message" name="message" class="form-control" v-model='email.message' required autofocus>
                    </textarea>
                  </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" @click="showModalNew">Cancelar</button>
            <button type="button" class="btn btn-success" v-if="newEmail" @click = "addEmail()">Eviar <span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
            <button type="button" class="btn btn-success" v-if="editEmail" @click = "updateEmail()">Actualizar Antecedente</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Header -->
    <div class="form-group">
      <div class="col-md-12">
        <div class="clearfix">
          <label class="title-separator">Emails Sent</label>

          <button type="button" class="btn btn-sm btn-info pull-right" @click="showModalNew">
            Nuevo <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
          </button>
        </div>
      </div>
    </div>
    <!-- Table -->
    <table class="table table-striped">
      <thead>
        <tr>
          <!-- <th class="hidden-xs">#</th> -->
          <th>Date</th>
          <th>To</th>
          <th class="action-column"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(email, index) in emails">
          <!-- <td class="hidden-xs">{{ index + 1 }}</td> -->
          <td>{{ email.date }}</td>
          <td>{{ email.to }}</td>
          <td>
            <a href="#" @click="showModalEdit(email)">editar</a> | <a href="#" @click="deleteEmail(email, index)">eliminar</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {

  name: 'emailnotifications',

  data () {
    return {
      emails: [],
      email: {
        date: '',
        from: 'patricio.galarza.r@gmail.com',
        to: 'agalarzar@iess.gob.ec',
        cc: 'tpizarroo@iess.gob.ec',
        subject: 'Test',
        message: 'Test text'
      },
      newEmail: true,
      editEmail: false,
      msgSuccess: false,
      msgError: false,
      msgText: '',
      show: false
    }
  },
  methods: {
    getEmails: function () {
      axios.get('api/emails/all')
          .then(response => {
            // success
            console.log(response.data)
            this.msgSuccess = true
            this.msgText = 'Emails loaded.'
            this.emails = response.data
          }, error => {
            this.msgError = true
            this.msgText = 'Error no emails loaded. '+error.message
          })
      },
      addEmail: function () {
        // save
        axios.post('/api/emails/send', this.email)
          .then(response =>{
            // eventBus.$emit('update_emails_list')
            this.getEmails()
            this.newEmail = true
            this.editEmail = false
            this.msgSuccess = true
            this.msgText = 'Success email sent.'
            this.showModalNew()
            console.log('Email added: ', this.email)
          }, error => {
            this.msgError = true
            this.msgText = 'Error email not sent. '+error.message
            console.log('Submit: email not sent. '+error.message)
          })
      },
      deleteEmail: function (email, index) {
        var confirmBox = confirm('Esta seguro que desea borrar el email?')

        if (confirmBox) {
          axios.delete('api/emails/destroy/'+email.id)
            .then(response =>{
              this.emails.splice(index, 1)
              this.msgSuccess = true
              this.msgText = 'Success email deleted.'
              console.log('Email deleted: ', email)
            }, response => {
              this.msgError = true
              this.msgText = 'Error email not deleted.'
              console.log('Submit: email not deleted.')
            })
        }
      },
      cleanData: function () {
        this.email = {
          date: '',
          date: '',
          from: 'patricio.galarza.r@gmail.com',
          to: 'agalarzar@iess.gob.ec',
          cc: 'tpizarroo@iess.gob.ec',
          subject: 'Test',
          message: 'Test text'
        }
      },
      showModalNew: function() {
        this.show = !this.show
        this.cleanData()
        this.newDiagnosis = true
        this.editDiagnosis = false
      },
      showModalEdit: function(email) {
        this.email = email
        this.newEmail = false
        this.editEmail = true
        this.show = !this.show
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
    mounted () {
      this.getEmails()
    }
}
</script>

<style lang="css" scoped>
</style>