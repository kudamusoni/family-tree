<template>
    <div class="w-full flex justify-center">
        <div class="bg-white p-6 border rounded-lg">
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" class="mb-5 rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" placeholder="First Name" v-model="member.name">

            <label for="gender">Gender</label>
            <select name="gender" placeholder="Gender" class="mb-5 rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" v-model="member.gender">
                <option value="">N/A</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="mother">Mother</label>
            <select name="mother" placeholder="Mother" class="mb-5 rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" v-model="member.mid">
                <option value="">N/A</option>
                <option v-for="person in getWomen" :key="person.id" :value="person.id">{{ person.name }}</option>
            </select>

            <label for="father">Father</label>
            <select name="father" placeholder="Father" class="mb-5 rounded-md border-0 py-1.5 pl-2 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full" v-model="member.fid">
                <option value="">N/A</option>
                <option v-for="person in getMen" :key="person.id" :value="person.id">{{ person.name }}</option>
            </select>

            <label for="age">Date of Birth</label>
            <VueDatePicker
                class="mb-2"
                format="dd/MM/yyyy"
                inputFormat="dd/MM/yyyy"
                :locale="enGB"
                :max-date="new Date()"
                :enable-time-picker="false"
                text-input auto-apply
                v-model="member.dob"
            ></VueDatePicker>

            <div class="flex justify-between mt-8">
                <button @click="addMember" :disabled="!validDetails" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 disabled:bg-gray-400 focus:outline-none">
                    Save
                </button>

                <button @click="close" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 focus:outline-none">
                    Close
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
    components: {VueDatePicker},
    data() {
        return {
        }
    },
    props: {
        family: {
            type: Object
        },
        member: {
            type: Object
        }
    },
    computed: {
        age() {
            return moment(this.member.dob, 'YYYY-MM-DD').format('DD/MM/YYYY');
        },
        validDetails() {
            if (this.member.name && this.member.dob) {
                return true;
            }
            return false;
        },
        memberDetails() {
            return [{
                "name": this.name,
                "gender": this.gender,
                "dob": this.dob,
                "mid": this.mid,
                "fid": this.fid,
            }]
        },
        getWomen() {
            return this.family.filter((person) => person.gender === 'female' && person.id !== this.member.id);
        },
        getMen() {
            return this.family.filter((person) => person.gender === 'male' && person.id !== this.member.id);
        }
    },
    methods: {
        close() {
        },
        addMember() {
            axios.patch(`/family/member/${this.member.id}/edit`, this.member)
                .then(response => {
                    console.log('Post created successfully!', response.data);
                    window.location.href = `/family/member/${this.member.id}`;
                    // return;
                })
                .catch(error => {
                    console.error('Error creating post:', error.response.data);
                });
        }
    },
    mounted(){
        console.log(this.member, this.family);
    }
}
</script>

<style></style>
