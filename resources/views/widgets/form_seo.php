<div class="form-group">
    <label>Tiêu đề seo</label>
    <input type="text" name="title_seo" value="<?= isset($item) ? $item->title_seo : ''?>" placeholder="Tiêu đề seo" class="form-control">
</div>
<div class="form-group">
    <label>Mô tả seo</label>
    <textarea name="description_seo" rows="5" class="form-control" placeholder="Mô tả seo"><?= isset($item) ? $item->description_seo : ''?></textarea>
</div>
<div class="form-group">
    <label>Từ khóa seo</label>
    <input type="text" name="keyword_seo" value="<?= isset($item) ? $item->keyword_seo : ''?>" placeholder="Từ khóa seo" class="form-control">
</div>