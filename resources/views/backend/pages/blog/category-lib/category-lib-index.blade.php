<style>
    .destination_main {
        border: 1px solid #d2d2d2;
        padding: 5px;
        background: #ffffff;
    }

    #destination_box {
        height: 150px;
        overflow: auto;
        padding: 10px;
    }

    #destination_box ul {
        list-style-type: none;
        margin: 0;
        padding: 2px 0 0 5px;
    }

    .box-section {
        margin-top: 10px;
        display: none;
    }

</style>

<div class="destination_main">
    <div class="row">
        <div class="col-md-12">
            <h1 style="font-size: 18px;padding: 5px;">Category</h1>
        </div>
        <div class="col-md-12">
            <div id="destination_box"></div>
        </div>
        <div class="col-md-12 mb-2 mt-2">
            <a id="addmorecategory" style="padding-left: 15px;font-weight: bold;cursor: pointer;">Add More Category</a>
        </div>
        <div class="col-md-12 box-section">
            <div class="form-group mb-2">
                <label for="category_name">Category Name</label>
                <input type="text" id="category_name" class="form-control form-control-sm">
            </div>
            <div class="form-group mb-2">
                <div id="box"></div>
            </div>
            <div class="form-group">
                <a id="addData" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Add Category
                </a>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(document).ready(function () {
            $('#addmorecategory').click(function () {
                $('.box-section').toggle();
            });

        });


        function renderCheckBox(category, level, checkifDataIdComming = null) {

            return `
            <li>
              <input type="checkbox" name="categories[]"  value="${category.id}">
              ${level > 0 ? '-'.repeat(level) + category.name : category.name}
              ${category.children ? `<ul>${category.children.map((childCategory) => renderCheckBox(childCategory, level + 1)).join('')}</ul>` : ''}
            </li>
          `;

        }

        function createCheckBox(category) {
            const checkBox = document.createElement('ul');
            checkBox.innerHTML = renderCheckBox(category, 0);
            checkBox.innerHTML = category.map((category) => renderCheckBox(category, 0)).join('');
            return checkBox;
        }


        function renderOptions(category, level) {
            const options = [];

            options.push(
                `<option value="${category.id}">
                 ${level > 0 ? '-'.repeat(level) + category.name : category.name}
            </option>`
            );
            if (category.children) {
                category.children.forEach((childCategory) => {
                    options.push(...renderOptions(childCategory, level + 1));
                });
            }
            return options.join('');
        }

        function createDropdown(categories, id) {
            const select = document.createElement("select");
            select.className = "form-control form-control-sm";
            select.setAttribute('id', id);
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.text = "Select Category";
            select.appendChild(defaultOption);
            select.innerHTML += categories.map((category) => renderOptions(category, 0)).join('');
            return select;
        }

        function getCategory() {
            let url = "{{route('get-ajax-category')}}";
            axios.get(url).then((res) => {
                let data = res.data.categoryData;
                $('#box').html(createDropdown(data, 'categoryId'));
                $('#destination_box').html(createCheckBox(data))
            });
        }

        getCategory();

        document.querySelector('#addData').addEventListener('click', function () {
            let catName = $('#category_name').val();
            let parentId = $('#categoryId').val();
            let sendData = {
                name: catName,
                parent_id: parentId
            };
            let url = "{{ route('get-ajax-category') }}";
            axios.post(url, sendData)
                .then((res) => {
                    if (res.status === 200) {
                        $('#category_name').val('');
                        $('#parent_id').val('');
                        getCategory();
                    } else {
                        console.log('Failed to add category');
                    }
                })
                .catch((e) => {
                    console.log('Error:', e);
                });
        });


    </script>
@endsection





