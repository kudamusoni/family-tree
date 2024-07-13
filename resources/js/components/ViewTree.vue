<template>
    <div id="tree" ref="tree"></div>
</template>
<style scoped>
#tree {
    width: 100%;
    height: 100%;
}
</style>
<script>
    import FamilyTree from '@balkangraph/familytree.js'
    export default {
        data() {
            return {
                nodes: [
                    { id: 1, pids: [2, 6], name: "Amber McKenzie", gender: "female", img: "https://cdn.balkan.app/shared/2.jpg"  },
                    { id: 2, pids: [1], name: "Ava Field", gender: "male", img: "https://cdn.balkan.app/shared/m30/5.jpg" },
                    { id: 6, pids: [1], name: "POP Field", gender: "male", img: "https://cdn.balkan.app/shared/m30/5.jpg" },
                    { id: 3, mid: 1, fid: 2, name: "Peter Stevens", gender: "male", img: "https://cdn.balkan.app/shared/m10/2.jpg" },
                    { id: 4, mid: 1, fid: 2, name: "Savin Stevens", gender: "male", img: "https://cdn.balkan.app/shared/m10/1.jpg"  },
                    { id: 5, mid: 1, fid: 2, name: "Emma Stevens", gender: "female", img: "https://cdn.balkan.app/shared/w10/3.jpg" },
                    { id: 7, mid: 1, name: "Emma Stevens", gender: "female", img: "https://cdn.balkan.app/shared/w10/3.jpg" }
                ],
                nodeBinding: {
                    field_0: "name",
                    img_0: "img",
                },
            }
        },
        mounted() {
            const domEl = this.$refs.tree;
            this.familyTree = new FamilyTree(domEl, {
                nodes: this.nodes,
                nodeBinding: this.nodeBinding
            });
        }
    }
</script>
