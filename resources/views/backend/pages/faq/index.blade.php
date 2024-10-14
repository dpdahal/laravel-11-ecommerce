@extends('backend.master.main')
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-2 mt-3 mb-4">
                                    <h2><i class="bi bi-plus-circle"></i> Manage Faq Section </h2>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="faq-form">
                                        <input type="hidden" id="faq-id">
                                        <div class="form-group mb-3">
                                            <label for="type">Type:</label>
                                            <select id="type" class="form-control" required>
                                                <option value="">Select Type</option>
                                                <option value="general">General</option>
                                                <option value="employer">Store</option>
                                                <option value="jobseeker">Job Seeker</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="question">Question:</label>
                                            <input type="text" id="question" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="answer">Answer:</label>
                                            <textarea id="answer" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <button class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div id="faq-list"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // Initialize CKEditor for the answer field
            CKEDITOR.replace('answer', {
                filebrowserUploadUrl: ckeditorUploadUrl,
                filebrowserUploadMethod: 'form'
            });

            loadFaqs();

            // Handle form submission
            $('#faq-form').submit(function (e) {
                e.preventDefault();
                const id = $('#faq-id').val();
                const type = $('#type').val();  // Get the type value
                const question = $('#question').val();
                const answer = CKEDITOR.instances['answer'].getData();

                if (id) {
                    updateFaq(id, type, question, answer);  // Pass type to updateFaq
                } else {
                    createFaq(type, question, answer);  // Pass type to createFaq
                }
            });

            // Create a new FAQ
            function createFaq(type, question, answer) {
                $.ajax({
                    url: "{{route('manage-faqs.store')}}",
                    method: 'POST',
                    data: {type, question, answer},  // Include type
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        loadFaqs();
                        resetForm();
                    }
                });
            }

            // Update an existing FAQ
            function updateFaq(id, type, question, answer) {
                let url = "{{route('manage-faqs.update', ':id')}}";
                $.ajax({
                    url: url.replace(':id', id),
                    method: 'PUT',
                    data: {type, question, answer},  // Include type
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        loadFaqs();
                        resetForm();
                    }
                });
            }

            // Delete an FAQ
            function deleteFaq(id) {
                $.ajax({
                    url: "{{route('manage-faqs.destroy', ':id')}}".replace(':id', id),
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        loadFaqs();
                        console.log(response);
                    }
                });
            }

            // Load all FAQs
            function loadFaqs() {
                $.get("{{route('all-faqs')}}", function (faqs) {
                    let html = '';
                    faqs.forEach(faq => {
                        html += `
                            <div>
                                <h3>${faq.question}</h3>
                                <p>${faq.answer}</p>
                                <button onclick="editFaq(${faq.id}, '${faq.type}', '${faq.question}', '${faq.answer.replace(/'/g, "\\'")}')">Edit</button>
                                <button onclick="deleteFaq(${faq.id})">Delete</button>
                            </div>
                        `;
                    });
                    $('#faq-list').html(html);
                });
            }

            // Edit an existing FAQ
            window.editFaq = function (id, type, question, answer) {
                $('#faq-id').val(id);
                $('#type').val(type);  // Set the type in the form
                $('#question').val(question);
                CKEDITOR.instances['answer'].setData(answer);  // Set data in CKEditor
            }

            // Reset the form
            function resetForm() {
                $('#faq-id').val('');
                $('#type').val('general');  // Reset type to default value
                $('#question').val('');
                CKEDITOR.instances['answer'].setData('');  // Clear CKEditor content
            }

            // Make deleteFaq available globally
            window.deleteFaq = deleteFaq;
        });
    </script>
@endsection
