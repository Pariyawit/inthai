<template>
    <div
        class="container"
        :class="{ sortingItem: sortingItem, sortingCategory: sortingCategory }"
    >
        <div class="d-flex flex-row-reverse">
            <button
                class="btn btn-success"
                @click.prevent="sortItem"
                v-show="!sortingItem && !sortingCategory"
            >
                Sort Item
            </button>
            <button
                class="btn btn-success"
                @click.prevent="sortCategory"
                v-show="!sortingItem && !sortingCategory"
            >
                Sort Category
            </button>
            <button
                class="btn btn-success"
                @click.prevent="saveSort"
                v-show="sortingItem || sortingCategory"
            >
                Cancel
            </button>
        </div>
        <li class="list__item list__item--head mb-3">
            <div class="row">
                <div class="list__field col-3 pl-3">
                    Item
                </div>
                <div class="list__field col-4 pl-1">
                    Description
                </div>
                <div
                    class="list__field col-1 d-flex justify-content-center align-items-center"
                >
                    Veg
                </div>
                <div
                    class="list__field col-1 d-flex justify-content-center align-items-center"
                >
                    Sold out
                </div>
                <div class="list__field col-1 text-right pr-1">Price ($)</div>
            </div>
        </li>
        <draggable
            v-model="categories"
            group="categories"
            draggable=".draggable-category"
            @start="drag = true"
            @end="onEndCategory"
            ghost-class="ghost"
            :options="{ disabled: !sortingCategory }"
        >
            <div
                v-for="(category, index) in categories"
                :key="category.id"
                class="draggable-category"
            >
                <div class="category">
                    <div
                        class="d-flex flex-column category__head"
                        v-if="!category.editting"
                    >
                        <div class="d-flex">
                            <h3>{{ category.title }}</h3>
                            <div class="mx-3">
                                <button
                                    class="list__button list__button--icon mx-1"
                                    @click.prevent="editCategory(category)"
                                >
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button
                                    class="list__button list__button--icon mx-1"
                                    @click.prevent="destroyCategory(category)"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <p>
                            {{ category.description }}
                        </p>
                    </div>
                    <div
                        v-else="category.editting"
                        class="category__head--editting"
                    >
                        <div class="d-flex mb-1">
                            <ValidationObserver v-slot="{ invalid }">
                                <form action="">
                                    <ValidationProvider
                                        rules="required"
                                        v-slot="{ errors }"
                                    >
                                        <input
                                            type="text"
                                            v-model="category.title"
                                            class="category__input"
                                        />
                                        <span class="error">{{
                                            errors[0]
                                        }}</span>
                                    </ValidationProvider>
                                    <button
                                        class="list__button list__button--save mx-1"
                                        @click.prevent="savedCategory(category)"
                                        :disabled="invalid"
                                    >
                                        Save
                                    </button>
                                    <button
                                        class="list__button list__button--cancel mx-1"
                                        @click.prevent="
                                            cancelCategory(category)
                                        "
                                    >
                                        Cancel
                                    </button>
                                </form>
                            </ValidationObserver>
                        </div>
                        <textarea
                            name=""
                            v-model="category.description"
                            id=""
                            rows="2"
                            class="w-100"
                        ></textarea>
                    </div>
                </div>
                <ul class="list">
                    <draggable
                        v-model="category.items"
                        group="items"
                        draggable=".draggable-item"
                        @start="drag = true"
                        @end="onEndItem"
                        ghost-class="ghost"
                        :data-category-id="category.id"
                        :options="{ disabled: !sortingItem }"
                    >
                        <div
                            v-for="item in category.items"
                            :key="item.id"
                            class="draggable-item"
                        >
                            <admin-list-item
                                :item="item"
                                :category="category"
                                :newItem="false"
                                :key="item.id"
                                @destroyItem="destroyItem"
                            ></admin-list-item>
                        </div>
                        <div slot="footer">
                            <li
                                class="list__item list__item--add"
                                v-if="!category.addingItem"
                                @click="addItem(category)"
                            >
                                + New Item
                            </li>

                            <div v-if="category.addingItem">
                                <admin-list-item
                                    :item="[]"
                                    :category="category"
                                    :newItem="true"
                                    @destroyItem="destroyItem"
                                    @cancel="cancel"
                                    @saved="saved"
                                ></admin-list-item>
                            </div>
                        </div>
                    </draggable>
                </ul>
            </div>
        </draggable>
        <div class="category">
            <div
                class="d-flex flex-column category--add"
                v-if="!addingCategory"
                @click="addCategory"
            >
                + New Category
            </div>
            <div v-else class="category__head--editting">
                <div class="d-flex mb-1">
                    <ValidationObserver v-slot="{ invalid }">
                        <form action="">
                            <ValidationProvider
                                rules="required"
                                v-slot="{ errors }"
                            >
                                <input
                                    type="text"
                                    v-model="newCategory.title"
                                    class="category__input"
                                />
                                <span class="error">{{ errors[0] }}</span>
                            </ValidationProvider>
                            <button
                                class="list__button list__button--save mx-1"
                                @click.prevent="storeCategory()"
                                :disabled="invalid"
                            >
                                Save
                            </button>
                            <button
                                class="list__button list__button--cancel mx-1"
                                @click.prevent="cancelNewCategory()"
                            >
                                Cancel
                            </button>
                        </form>
                    </ValidationObserver>
                </div>
                <textarea
                    name=""
                    v-model="newCategory.description"
                    id=""
                    rows="2"
                    class="w-100"
                ></textarea>
            </div>
        </div>
    </div>
</template>

<script>
import AdminListItem from "../components/AdminListItem.vue";
import {
    ValidationProvider,
    ValidationObserver
} from "vee-validate/dist/vee-validate.full";
import draggable from "vuedraggable";
export default {
    components: {
        AdminListItem,
        ValidationProvider,
        ValidationObserver,
        draggable
    },
    data: function() {
        return {
            categories: [],
            title: "",
            description: "",
            newCategory: {
                title: "",
                description: ""
            },
            addingCategory: false,
            oldItemIndex: "",
            newItemIndex: "",
            sortingItem: false,
            sortingCategory: false
        };
    },
    methods: {
        addItem: function(category) {
            category.addingItem = true;
        },
        saved: function(category) {
            category.addingItem = false;
        },
        cancel: function(category) {
            category.addingItem = false;
        },
        destroyItem: function(item, category) {
            if (confirm("Delete " + item.title + " ?")) {
                axios
                    .delete("/admin/items/" + item.id)
                    .then(res => console.log(res))
                    .catch(err => console.log(err));

                console.log(item);
                let items = category.items;
                for (let i = 0; i < items.length; i++) {
                    if (items[i].id == item.id) {
                        items = items.splice(i, 1);
                        return;
                    }
                }
            }
        },
        addCategory: function() {
            this.addingCategory = true;
        },
        cancelNewCategory: function() {
            this.addingCategory = false;
            this.newCategory = {
                title: "",
                description: ""
            };
        },
        storeCategory: function() {
            this.addingCategory = false;
            axios
                .post("/admin/categories", this.newCategory)
                .then(res => {
                    console.log(res.data);
                    const tmp = {
                        ...res.data,
                        addingItem: false,
                        editting: false,
                        items: []
                    };
                    this.categories.push(tmp);
                })
                .catch(err => console.log(err));
        },
        editCategory: function(category) {
            category.editting = true;
            this.title = category.title;
            this.description = category.description;
            console.log(this.categories);
        },
        savedCategory: function(category) {
            category.editting = false;
            axios
                .post("/admin/categories/" + category.id, category)
                .then(res => {
                    console.log(res.data);
                })
                .catch(err => console.log(err));
        },
        cancelCategory: function(category) {
            category.editting = false;
            category.title = this.title;
            category.description = this.description;
            console.log(this.categories);
        },
        destroyCategory: function(category) {
            if (
                confirm("Delete '" + category.title + "' and all of its items?")
            ) {
                axios
                    .delete("/admin/categories/" + category.id)
                    .then(res => {
                        console.log(res.data);
                    })
                    .catch(err => console.log(err));
                this.categories = this.categories.filter(
                    cat => cat.id != category.id
                );
            }
        },
        onEndItem: function(event) {
            console.log(event);
            const from = {
                categoryId: parseInt(event.from.dataset.categoryId),
                index: event.oldIndex
            };
            const to = {
                categoryId: parseInt(event.to.dataset.categoryId),
                index: event.newIndex
            };
            console.log(from);
            console.log(to);
        },
        onEndCategory: function(event) {
            console.log(event);
            const from = {
                index: event.oldIndex
            };
            const to = {
                index: event.newIndex
            };
            console.log(from);
            console.log(to);
        },
        sortItem: function() {
            this.sortingItem = true;
            console.log(this.sortingItem);
        },
        sortCategory: function() {
            this.sortingCategory = true;
            console.log(this.sortingCategory);
        },
        saveSort: function() {
            this.sortingCategory = false;
            this.sortingItem = false;
        }
    },
    created() {
        sessionStorage.clear();
        let vm = this;
        axios
            .get("/categories")
            .then(function(response) {
                // vm.categories = response.data;
                let categories = response.data;
                categories.forEach(category => {
                    category.addingItem = false;
                    category.editting = false;
                    vm.categories.push(category);
                });
            })
            .catch(err => console.log(err));
    }
};
</script>

<style lang="scss" scoped>
.error {
    position: absolute;
    bottom: -1rem;
    left: 1rem;
    background: yellow;
    height: 1.25rem;
    line-height: 1.25rem;
}
</style>
