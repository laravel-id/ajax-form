<template>
	<form @submit.prevent="send" method="post" action="/send">

		<div v-if="success" class="alert alert-success">
			Terima kasih. Pesan berhasil dikirim.
		</div>

		<div class="form-group">
			<label>Nama Lengkap</label>
			<input v-model="state.name" type="text" name="name" class="form-control">
			<span class="label label-danger">{{ error(errors.name) }}</span>
		</div>

		<div class="form-group">
			<label>Pos-el</label>
			<input v-model="state.email" type="email" name="email" class="form-control">
			<span class="label label-danger">{{ error(errors.email) }}</span>
		</div>

		<div class="form-group">
			<label>Pesan</label>
			<textarea v-model="state.message" name="message" class="form-control"></textarea>
			<span class="label label-danger">{{ error(errors.message) }}</span>
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">
				Kirim Pesan
			</button>
		</div>
		
	</form>	
</template>

<script>
	export default {
		data() {
			return {
				success: false,
				errors: [],
				state: {
					name: '',
					email: '',
					message: ''
				}
			}
		},

		methods: {

			send(e) {
				axios.post(e.target.action, this.state).then(response => {
					this.success = response.data.success;
					
					if(response.data.success == true) {
						this.errors = [];

						this.state = {
							name: '',
							email: '',
							message: ''
						}
					}
				}).catch(error => {
					if (error.response.status == 422) {
						this.errors = error.response.data;
					}
				})
			},

			error(field) {
				return _.head(field);
			}
		}
	}
</script>