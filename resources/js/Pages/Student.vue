<template>
    <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Student Sign in</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form @submit.prevent="submitForm" class="space-y-6" method="post" action="student">
                
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Enter student name</label>
                    <div class="mt-2">
                        <input v-model="student.student_name" id="name" name="student_name" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div>
                    <label for="roll" class="block text-sm font-medium leading-6 text-gray-900">Enter roll no</label>
                    <div class="mt-2">
                        <input v-model="student.Roll_no" id="roll" name="Roll_no" type="number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>

            </form>
            <div>
                    not account?
                    <a href="studentlogin">click here to sign up</a>
                </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            student: {
                student_name: '',
                Roll_no: ''
            },
            message: ''
        };
    },
    methods: {
        async submitForm() {
            try {
                const response = await axios.post('/student', this.student);
                this.message = response.data.message;
                
                this.student.student_name = '';
                this.student.Roll_no = '';
            } catch (error) {
                console.error('An error occurred:', error.response.data);
            }
        }
    }
};
</script>
