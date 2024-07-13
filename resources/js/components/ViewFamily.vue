<template>
  <div id="tree" ref="tree"></div>
</template>
<script>
import FamilyTree from '@balkangraph/familytree.js'

export default {
  components: {},
  props: ['family'],
  data() {
    return {
    }
  },
  methods: {
    createTree() {
      const domEl = this.$refs.tree;
      this.familyTree = new FamilyTree(domEl, {
        editUI: null,
        mouseScrool: FamilyTree.none,
        // scaleInitial: FamilyTree.match.boundary,
        // nodes: this.family,
        nodes: [
            { id: 1, pids: [2, 6], name: "Lyly", gender: "female", img: "https://cdn.balkan.app/shared/2.jpg"  },
            { id: 2, pids: [1], name: "SiWof", gender: "male", img: "https://cdn.balkan.app/shared/m30/5.jpg" },
            { id: 6, pids: [1, 8], name: "Jff", gender: "male", img: "https://cdn.balkan.app/shared/m30/5.jpg" },
            { id: 8, pids: [6], name: "MaT", gender: "female", img: "https://cdn.balkan.app/shared/m30/5.jpg" },
            { id: 3, mid: 1, fid: 6, pids: [11], name: "Kuda", gender: "male", img: "https://cdn.balkan.app/shared/m10/2.jpg" },
            { id: 4, mid: 1, fid: 2, name: "Kwabz", gender: "male", img: "https://cdn.balkan.app/shared/m10/1.jpg"  },
            { id: 5, mid: 1, fid: 2, name: "Kiki", gender: "female", img: "https://cdn.balkan.app/shared/w10/3.jpg" },
            { id: 7, mid: 8, fid: 6, name: "Boy 1", gender: "male", img: "https://cdn.balkan.app/shared/w10/3.jpg" },
            { id: 9, mid: 8, fid: 6, name: "Boy 2", gender: "male", img: "https://cdn.balkan.app/shared/w10/3.jpg" },
            { id: 10, mid: 8, fid: 6, name: "Boy 3", gender: "male", img: "https://cdn.balkan.app/shared/w10/3.jpg" },
            { id: 11, pids: [3], name: "Jawn", gender: "female", img: "https://cdn.balkan.app/shared/w10/3.jpg" },
        ],
        nodeBinding: {
            field_0: "name",
        },
      });

    //   this.familyTree.on('render-link', function(sender, args){
    //     var cnodeData = family.get(args.cnode.id);
    //     var nodeData = family.get(args.node.id);

    //     if (cnodeData.divorced != undefined && nodeData.divorced != undefined &&
    //       cnodeData.divorced.includes(args.node.id) && nodeData.divorced.includes(args.cnode.id)) {
    //         console.log(args.html);
    //         args.html = args.html.replace("path", "path stroke-dasharray='3, 2'");
    //     }
    // });

      this.familyTree.on('click', (sender, args) => {
        // sender.editUI.show(args.node.id, false);
        window.location.href = `/family/member/${args.node.id}`;
        return false; //to cancel the click event
      });
    },
  },
  watch: {
  },
  mounted() {
    this.createTree()
  },
}
</script>
