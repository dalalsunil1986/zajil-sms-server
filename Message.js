import React, { Component, PropTypes } from 'react';
import { Image, Text, TouchableHighlight, View, ScrollView } from 'react-native';
import { connect } from 'react-redux';
import { Actions } from 'react-native-router-flux';
import Calendar from './../../components/Calendar';
import TimingList from './Scenes/TimingList';
import ConfirmButton from './../../components/ConfirmButton';
import MessageForm from './Scenes/MessageForm';
import { selectMessage } from './messageActions';
import { addToOrder,cancelFromOrder } from './../Order/orderActions';

class Message extends Component {

  static propTypes = {
    itemID:PropTypes.number.isRequired
  };

  constructor(props) {
    super(props);
    this.state= {
      selectedDate: new Date(),
      selectedTime: 'صباح',
      textMessage:this.props.messageReducer.isSelected ? this.props.messageReducer.textMessage: ''
    };
  }

  onDateChange(date) {
    this.setState({ selectedDate: date });
  }

  onTimeSelect(time) {
    this.setState({
      selectedTime: time
    });
  }

  onTextChange(text) {
    this.setState({
      textMessage:text
    })
  }

  confirm() {
    const {dispatch,messageReducer,itemID,oldMessage,message} =this.props;
    if(messageReducer.isSelected) {
      dispatch(cancelFromOrder(oldMessage.price));
    }
    dispatch(selectMessage(itemID,this.state.selectedDate,this.state.selectedTime,this.state.textMessage));
    dispatch(addToOrder(message.price));

    Actions.home();
  }

  render() {
    const { timings } = this.props;

    return (
      <ScrollView
        contentContainerStyle={{ paddingTop:64,margin:10,marginBottom:40 }}
        style={{ backgroundColor: 'white' }}
        contentInset={{ bottom:40 }}
      >
        <Calendar
          selectedDate={this.state.selectedDate}
          onDateChange={this.onDateChange.bind(this)}
        />
        <TimingList
          timings={timings}
          selectedTime={this.state.selectedTime}
          onTimeSelect={this.onTimeSelect.bind(this)}
        />

        <MessageForm
          textMessage={this.state.textMessage}
          onChange={this.onTextChange.bind(this)}
        />

        <ConfirmButton
          text='إضافة'
          confirm={this.confirm.bind(this)}
        />

      </ScrollView>
    );
  }
}

function makeMapStateToProps(initialState, initialOwnProps) {
  const itemID = initialOwnProps.itemID;

  return function mapStateToProps(state) {
    const messageReducer = state.messageReducer;
    const oldMessage = messageReducer.isSelected ? state.entities.messages[state.messageReducer.selectedEntity] : {}

    return {
      oldMessage,
      messageReducer,
      message:state.entities.messages[itemID],
      timings:['صباح','مساء']
    }
  }
}

export default connect(makeMapStateToProps)(Message);
