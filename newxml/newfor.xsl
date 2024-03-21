<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
    <h1>Movies Collections</h1>
    <table border = "1">
    <tr bgcolor = "#232434">
        <th>Movie Name</th>
        <th>Director</th>
        <th>Release Date</th>
        <th>Box Office $</th>
        <th>Rating</th>
    </tr>
    <xsl:for-each select="catalog/cd">
    <tr>
        <td><xsl:value-of select="title" /></td>
        <td><xsl:value-of select="director" /></td>
        <td><xsl:value-of select="Release_Date" /></td>
        <!-- <td><xsl:value-of select="distributer" /></td> -->
        <td><xsl:value-of select="box_office" /></td>
        <td><xsl:value-of select="rating" /></td>
    </tr>
    </xsl:for-each>
    
    </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>