<media-manage-modal inline-template>
    <div>
        {{-- manager --}}
        <div v-if="inputName">@include('MediaManager::extras.modal')</div>
 
        <media-modal item="links" :name="inputName" :multi="true"></media-modal>

        {{-- for editor --}}
        @include('MediaManager::extras.editor') 

            {{-- links --}}
            <section>
                <div class="gallery">
                    <div class="gallery-item" v-for="item in links">                            
                        <img :src="item">
                        <span @click.stop="customGallery(item)" class="trash"> <i class="fa fa-trash"></i> </span>
                        <input type="hidden" name="links[]" :value="item" :key="item">
                    </div>
                </div>
        

                <button @click="toggleModalFor('links')">select gallery links</button>
            </section>

           
        <!-- </form> -->
    </div

</media-manage-modal>

