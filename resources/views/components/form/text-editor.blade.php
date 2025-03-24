<div>
    <div x-data="{ value: @entangle($attributes->wire('model')) }" x-init="tinymce.init({
        target: $refs.tinymce,
        themes: 'modern',
        height: 200,
        menubar: false,
        language: 'id',
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        ],
        {{-- toolbar: 'undo redo | formatselect | ' +
            'bold italic image link backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help', --}}
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        setup: function(editor) {
            editor.on('blur', function(e) {
                value = editor.getContent()
            })
    
            editor.on('init', function(e) {
                if (value != null) {
                    editor.setContent(value)
                }
            })
    
            function putCursorToEnd() {
                editor.selection.select(editor.getBody(), true);
                editor.selection.collapse(false);
            }
    
            $watch('value', function(newValue) {
                if (newValue !== editor.getContent()) {
                    editor.resetContent(newValue || '');
                    putCursorToEnd();
                }
            });
        }
    })" wire:ignore>
        <div>
            <input x-ref="tinymce" type="textarea" {{ $attributes->whereDoesntStartWith('wire:model') }}>
        </div>
    </div>
    @error($attributes->wire('model')->value)
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror

    @pushOnce('script')
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"
            integrity="sha512-VCEWnpOl7PIhbYMcb64pqGZYez41C2uws/M/mDdGPy+vtEJHd9BqbShE4/VNnnZdr7YCPOjd+CBmYca/7WWWCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script></script> --}}
        <script src="https://cdn.tiny.cloud/1/0zexkvlq2r0q0vuzacuydrcube4sl0raka03dxvowe882yuu/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    @endpushOnce
</div>