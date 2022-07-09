<template>
    <div>
        <div class="main-container border p-1">
            <div class="card mb-1 rounded-0">
                <div class="card-body p-2 d-flex">
                    <h3 class="m-0 d-flex align-items-center">
                        <b-icon-files-alt />
                    </h3>
                    <span class="vl ml-4"></span>
                    <h5 class="my-0 ml-4 d-flex align-items-center">
                        File Name
                    </h5>
                    <!-- file details -->
                    <div class="row-reverse ml-5">
                        <p class="row-reverse mb-0" style="font-size: 9px">
                            Uploaded by:
                        </p>
                        <p class="row-reverse mb-0" style="font-size: 9px">
                            Name
                        </p>
                    </div>
                    <div class="row-reverse ml-5">
                        <p class="row-reverse mb-0" style="font-size: 9px">
                            Created at:
                        </p>
                        <p class="row-reverse mb-0" style="font-size: 9px">
                            Time
                        </p>
                    </div>
                    <!-- end of file details -->
                    <button class="btn btn-primary btn-sm btn-download">
                        Download
                    </button>
                </div>
            </div>
        </div>
        <button class="btn btn-success float-right mt-3">Upload Files</button>
    </div>
</template>

<script>
import { BIconFilesAlt, BIconDownload } from "bootstrap-icons-vue";
export default {
    components: {
        BIconFilesAlt,
        BIconDownload,
    },
};
</script>

<style scoped>
.main-container {
    background-color: #f0f0f0;
    height: 73vh;
    overflow-y: auto;
}

h3 {
    color: rgb(102, 102, 102);
}

.vl {
    border-left: 2px solid rgb(102, 102, 102);
    height: 28px;
}

.btn-download {
    position: absolute;
    right: 10px;
    bottom: 7px;
}
</style>
