'use strict';
import React, { PropTypes, Component } from 'react';
import { ListView,TouchableHighlight,StyleSheet,Text,View } from 'react-native';

export default class TimingList extends Component {

  static propTypes = {
    timings:PropTypes.array.isRequired,
    selectedTime:PropTypes.string.isRequired,
    onTimeSelect:PropTypes.func.isRequired
  };

  renderRow(time) {
    const {selectedTime} = this.props;
    return (
      <View style={[styles.cellContainer, selectedTime ?  (selectedTime == time ? styles.activeCell : '') : '']} key={time.id} >
        <TouchableHighlight onPress={()=>this.props.onTimeSelect(time)} underlayColor='transparent'>
            <Text style={styles.name}>
              {time}
            </Text>
        </TouchableHighlight>
      </View>
    )
  }

  render() {
    const {timings} = this.props;
    let ds = new ListView.DataSource({rowHasChanged: (r1, r2) => r1 != r2})
    let dataSource = timings ? ds.cloneWithRows(timings) : ds.cloneWithRows([]);
    return (
      <View >
        <ListView
          horizontal={true}
          showsHorizontalScrollIndicator={false}
          dataSource={dataSource}
          renderRow={(rowData, sec, i) => this.renderRow.bind(this)}
          renderRow={this.renderRow.bind(this)}
          automaticallyAdjustContentInsets={false}
          style={styles.container}
          enableEmptySections={true} //@todo remove this in future version
        />

      </View>
    );
  }

}

var styles = StyleSheet.create({

  container: {
    marginBottom:20,
    marginTop:0,
    alignSelf:'center'
  },
  cellContainer:{
    backgroundColor:'#e7e7e7',
    height:50,
    width:50,
    borderRadius:25,
    margin:5,
    justifyContent:'center'
  },
  activeCell : {
    backgroundColor:'#99ddff'
  },
  name: {
    color: 'white',
    fontSize:14,
    fontWeight:'700',
    textAlign:'center'
  }

});
