<media-manage-modal inline-template>
    <div>
        {{-- manager --}}
        <div v-if="inputName">@include('MediaManager::extras.modal')</div>

        {{-- items selector --}}
        <media-modal item="cover" :name="inputName"></media-modal>
        <media-modal item="gallery" :name="inputName" type="folder"></media-modal>
        <media-modal item="links" :name="inputName" :multi="true"></media-modal>

        {{-- for editor --}}
        @include('MediaManager::extras.editor')

        {{-- form --}}
        <!-- <form action="" method="..."> -->
            {{-- cover --}}
            <section>
                <img :src="cover">
                <input type="hidden" name="cover" :value="cover"/>
                <button @click="toggleModalFor('cover')">select cover</button>
            </section>

            {{-- gallery --}}
            <section>
                <input type="text" name="gallery" :value="gallery"/>
                <button @click="toggleModalFor('gallery')">select gallery folder</button>
            </section>

            {{-- links --}}
            <section>
                <img  v-for="item in links" :key="item" :src="item">
                <input v-for="item in links"
                    :key="item"
                    :value="item"
                    type="text" 
                    name="links[]"/>

                <button @click="toggleModalFor('links')">select gallery links</button>
            </section>

           
        <!-- </form> -->
    </div

</media-manage-modal>