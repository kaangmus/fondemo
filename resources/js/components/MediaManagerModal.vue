<script>
import MediaModal from '../../assets/vendor/MediaManager/js/mixins/modal'

export default {
    name: 'media-manage-modal',
    mixins: [MediaModal],

    // the inputs we want to use the manager for
    // in our case they are the article 'cover' & 'gallery'
    // for multi-selected files links "https://github.com/ctf0/Laravel-Media-Manager/issues/40#issuecomment-382416243"
    // 
    // for usage with an editor "wysiwyg" only, you dont need this part 
   data() {
        return {
            cover: '',
            gallery: '',
            links: '',
            images: ''
        }
    },
   methods:{
       customGallery(item){
           this.links.splice(item,1)
       }
   }
}
</script>