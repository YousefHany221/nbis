<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('لوحة تحكم الممرضة - تسجيل مولود جديد') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">اسم المولود</label>
                            <input type="text" name="baby_name"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                        </div>
                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">بيانات الأب / ولي الأمر (Parent Details)
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">اسم الأب بالكامل</label>
                                    <input type="text" name="father_name"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                        required>
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">رقم الهاتف (للتواصل)</label>
                                    <input type="text" name="father_phone"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                        required>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block font-medium text-sm text-gray-700">الرقم القومي للأب (National
                                        ID)</label>
                                    <input type="text" name="father_national_id"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">اسم الأم</label>
                            <input type="text" name="mother_name"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block font-medium text-sm text-gray-700">صورة بصمة القدم</label>
                            <input type="file" name="footprint"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded-md shadow-sm">
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            حفظ البيانات في النظام
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>