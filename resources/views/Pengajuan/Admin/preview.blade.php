<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview PDF</title>
    <script src="{{ asset('path/to/pdfjs-dist/build/pdf.js') }}"></script>
</head>
<body>
    <canvas id="pdfCanvas"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pdfPath = "{{ asset('doc/' . $file_path) }}";
            const canvas = document.getElementById('pdfCanvas');

            pdfjsLib.getDocument(pdfPath).then(function(pdf) {
                pdf.getPage(1).then(function(page) {
                    const scale = 1.5;
                    const viewport = page.getViewport({ scale: scale });

                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext);
                });
            });
        });
    </script>
</body>
</html>
