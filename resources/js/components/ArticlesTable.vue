<template>
    <div>
        <data-table :data="articles" title="All Articles">
            <table-col data-key="date" label="Date"></table-col>
            <table-col data-key="title" label="Title"></table-col>
            <table-col data-key="author.name" label="Author"></table-col>
            <table-col label="Published"></table-col>
        </data-table>
    </div>
</template>
<script>
export default {
    props:["articles"]
};
</script>
