<script>
    const allBody = document.querySelector('body');

    const fileModal = document.querySelector('#join-file-modal');

    const joinFile = document.querySelector('.join-file');
    joinFile.addEventListener('click', (e) => {
        fileModal.classList.toggle('invisible');
        // delModal.classList.add('visible');
    });

    // const imgModal = document.querySelector('#send-img-modal');

    // const sendImg = document.querySelector('.send-img');
    // sendImg.addEventListener('click', (e) => {
    //     imgModal.classList.toggle('invisible');
    //     // delModal.classList.add('visible');
    // });

    document.querySelector('.close-btn')
        .addEventListener('click', (e) => {
            imgModal.classList.add('invisible');
        });

        var filename = document.querySelector('.filename');
        var path = '../js/uploads/image/';
        var totalPath = path + filename.textContent
        // '../js/uploads/image/1712995062.jpg'
        let canvas = new fabric.Canvas('edit-image-canvas');
        fabric.Image.fromURL(totalPath, function(img) {
            img.set('selectable', false)
            canvas.add(img);
        });
        // rect.set('selectable', false)



        let addingLineBtn = document.querySelector('.draw-line-btn')
        addingLineBtnClicked = false;
        
        addingLineBtn.addEventListener('click', activatedAddingline)

        function activatedAddingline() {

            if (addingLineBtnClicked === false) {
                addingLineBtnClicked = true;
                canvas.on('mouse:down', startAddingLine);
                canvas.on('mouse:move', startDrawingLine);
                canvas.on('mouse:up', stopDrawingLine);
    
                canvas.selection = false;
                canvas.hoverCursor = 'auto'
            }
        }

        let line;
        let mouseDown = false;

        function startAddingLine(o) {
            mouseDown = true;

            let pointer = canvas.getPointer(o.e);

            line = new fabric.Line([pointer.x, pointer.y, pointer.x, pointer.y], {
                id: 'added-line',
                stroke: 'red',
                strokeWidth: 3,
                selectable: false
            });

            canvas.add(line);
            canvas.requestRenderAll();
        }

        function startDrawingLine(o) {
            if (mouseDown == true) {
                let pointer = canvas.getPointer(o.e);

                line.set({
                    x2: pointer.x,
                    y2: pointer.y
                });

                canvas.requestRenderAll();
            }

        }

        function stopDrawingLine() {
            mouseDown = false;

        }

        let desactivateAddingShapeBtn = document.querySelector('.done');

        desactivateAddingShapeBtn.addEventListener('click', desactivateAddingShape);

        function desactivateAddingShape() {
            canvas.off('mouse:down', startAddingLine);
            canvas.off('mouse:move', startDrawingLine);
            canvas.off('mouse:up', stopDrawingLine);

            addingLineBtnClicked = false;

        };

</script>