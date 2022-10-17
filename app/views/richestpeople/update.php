<form action="<?= URLROOT; ?>RichestPeople/update" method="post" >
    <label for="Name">Naam:</label>
    <input type="text" name="Name" id="Name" value="<?= $data["row"]->Name;  ?>">

    <label for="Networth">Vermogen:</label>
    <input type="text" name="Networth" id="Networth" value="<?= $data["row"]->Networth;  ?>">

    <label for="MyAge">Leeftijd:</label>
    <input type="text" name="MyAge" id="MyAge" value="<?= $data["row"]->MyAge;  ?>">

    <label for="Company">Bedrijf:</label>
    <input type="text" name="Company" id="Company" value="<?= $data["row"]->Company;  ?>">

    <input type="hidden" name="id" value="<?= $data["row"]->Id;  ?>">

    <input type="submit" value="Submit">
</form>