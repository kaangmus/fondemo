<media-manage-modal inline-template>
    <div>
        {{-- manager --}}
        <div v-if="inputName">@include('MediaManager::extras.modal')</div>

        {{-- items selector --}}
        <media-modal item="cover" :name="inputName"></media-modal>
        @include('MediaManager::extras.editor')

            <section>
                <img :src="cover">
                <input type="hidden" name="cover" :value="cover"/>
                <button @click="toggleModalFor('cover')">select cover</button>
            </section>          
     
    </div

</media-manage-modal>