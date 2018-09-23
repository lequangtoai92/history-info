
<div class="content-body container">
    <form  enctype="multipart/form-data" name="frm_save_content" onsubmit="saveContent()" method="post">
        <div class="row">
            <div class="content-left col-3">
                <div class="form-group">
                    <label for="usr">Tóm tắt:</label>
                    <textarea rows="4" class="form-control" name="compact"  placeholder"Tóm tắt" >
                    </textarea>
                </div>
                <div class="form-group">
                    <!-- <label for="usr">Hình ảnh:</label> -->
                    <input type="text" class="form-control" name="image" placeholder="Hình ảnh" >
                </div>
                <div class="form-group">
                    <!-- <label for="usr">Nhân vật liên quan:</label> -->
                    <input type="text" class="form-control" name="figure" placeholder="Nhân vật liên quan" >
                </div>
                <div class="form-group">
                    <!-- <label for="usr">Tên tác giả:</label> -->
                    <input type="text" class="form-control" name="author" placeholder="Tên tác giả" >
                </div>
                <div class="form-group">
                    <!-- <label for="usr">Nguồn:</label> -->
                    <input type="text" class="form-control" name="source" placeholder="Nguồn" >
                </div>
            </div>
            <div class="content-right col-9">
                <div class="name-title form-group">
                    <label for="usr">Tên tác phẩm:</label>
                    <input text="text" name="titlename" class="form-control" >
                </div>
                <div class="content-main">
                    <label for="usr">Nội dung:</label>
                    <textarea id="content_main" rows="4" name="maincontent" class="form-control" >
                    </textarea>         
                </div>
                <div class="footer-save form-group">
                    <button type="button" class="btn btn-primary save-content" value="Submit">Lưu lại</button>
                </div>
            </div>
        </div>
    </form>
</div>